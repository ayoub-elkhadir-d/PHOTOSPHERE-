<?php
require_once __DIR__ . '/../../Config/DataBase/db_con.php';
require_once __DIR__ . '/../Entities/Album.php';
require_once __DIR__ . '/../Interfaces/Interfase_Repo.php';

class Album_Repo implements RepositoryInterface{
    private PDO $pdo;

    public function __construct() {
        $db = new ConectiontDb();
        $this->pdo = $db->getConnection();
    }

public function getAlbumWithPhotos(int $id) 
{
    $stmt = $this->pdo->prepare("SELECT
    album_id, post.* FROM albumPost
INNER JOIN post ON albumPost.post_id = post.id
INNER JOIN album ON albumPost.album_id = album.id
 WHERE albumPost.album_id = :id AND album.visibility = 1
    ");
    $stmt->execute(['id' => $id]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$data) return null;
     
    return  $data;
    
}






public function Creat_album(Album $album, $user_id, $isPrivate) {
    $visibility = 0;
    $sql = "INSERT INTO album (user_id, title, description, visibility, photo_cover_url, photo_count, created_at, updated_at) VALUES (:user_id, :title, :description, :visibility, :cover, :count, :created, :updated)";
    $get_role = "SELECT role from User WHERE id = :user_id";
    $stmt = $this->pdo->prepare($get_role);
    $stmt->execute(['user_id' => $user_id]);
    $role = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($role['role'] == 'Pro') {
        $visibility = $isPrivate;
    } elseif ($role['role'] == 'Basic') {
        $visibility = 1;
    } else {
        return;
    }
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'user_id' => $album->get_user_id(),
        'title' => $album->getName(),
        'description' => $album->getDescription(),
        'visibility' => $visibility,
        'cover' => $album->getCover(),
        'count' => $album->getPhotoCount(),
        'created' => $album->getPublishedAt(),
        'updated' => $album->getUpdateAt()
    ]);
}



public function update(Album $album): bool
{
    $sql = "UPDATE album SET
        title = :title,
        visibility = :visibility,
        photo_cover_url = :cover,
        photo_count = :count,
        updated_at = :updated
        WHERE id = :id";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        'id'         => $album->getId(),
        'title'      => $album->getName(),
        'visibility' => $album->isPublic(),
        'cover'      => $album->getCover(),
        'count'      => $album->getPhotoCount(),
        'updated'    => date('Y-m-d H:i:s')
    ]);
}


    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM album WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

   public function  addPhotoToAlbum(int $photoId,int $albumId){
        $sql = "INSERT INTO albumPost VALUES (:post_id,:album_id)"; 
          $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        'post_id'=> $photoId,
        'album_id' => $albumId]);
   }
   public function  removePhotoFromAlbum(int $photoId,int $albumId){
        $sql = "DELETE  from albumPost where post_id = :postId and  album_id = :albumId"; 
          $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        'postId'=> $photoId,
        'albumId' => $albumId]);
   }


}
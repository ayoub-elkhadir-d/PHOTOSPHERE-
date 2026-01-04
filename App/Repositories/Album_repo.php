<?php
require_once 'db_con.php';
require_once 'Album.php';

class Album_Repo implements RepositoryInterface{
    private PDO $pdo;

    public function __construct() {
        $db = new ConectiontDb();
        $this->pdo = $db->getConnection();
    }

    public function fetch(int $id): ?Album {
        $stmt = $this->pdo->prepare("SELECT * FROM album WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) return null;

        return new Album(
            $data['id'],
            $data['name'],
            $data['public'],
            $data['cover'],
            $data['photoCount'],
            $data['publishedAt'],
            $data['updateAt']
        );
    }

    public function insert(Album $album): bool {
        $sql = "INSERT INTO album (name, public, cover, photoCount, publishedAt, updateAt) 
                VALUES (:name, :public, :cover, :count, :published, :updated)";
        
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            'name'      => $album->getName(),
            'public'    => $album->isPublic(),
            'cover'     => $album->getCover(),
            'count'     => $album->getPhotoCount(),
            'published' => $album->getPublishedAt(),
            'updated'   => $album->getUpdateAt()
        ]);
    }

    public function update(Album $album): bool {
        $sql = "UPDATE album SET 
                name = :name, 
                public = :public, 
                cover = :cover, 
                photoCount = :count, 
                updateAt = :updated 
                WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            'id'     => $album->getId(),
            'name'   => $album->getName(),
            'public' => $album->isPublic(),
            'cover'  => $album->getCover(),
            'count'  => $album->getPhotoCount(),
            'updated'=> date('Y-m-d H:i:s')
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM album WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
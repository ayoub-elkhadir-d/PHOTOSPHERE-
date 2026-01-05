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

public function fetch(int $id): ?Album
{
    $stmt = $this->pdo->prepare("SELECT * FROM album WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) return null;

    return new Album($data['id'],$data['title'],$data['description'],$data['visibility'],$data['photo_cover_url'],$data['photo_count'],$data['created_at'],$data['updated_at']
    );
}

public function fetchAll(): array
{
    $albums = [];

    $stmt = $this->pdo->prepare("SELECT * FROM album");
    $stmt->execute();

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $data) {
        $albums[] = new Album(
            $data['id'],
            $data['title'],
            $data['description'],
            $data['photo_cover_url'],
            $data['photo_count'],
            $data['created_at'],
            $data['updated_at']
        );
    }

    return $albums;
}


    public function insert(){}
public function insert_public_album(Album $album): bool
{
    $sql = "INSERT INTO album 
        (title, visibility, photo_cover_url, photo_count, created_at, updated_at) 
        VALUES (:title, :visibility, :cover, :count, :created, :updated)";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        'title'      => $album->getName(),
        'visibility' => 1,
        'cover'      => $album->getCover(),
        'count'      => $album->getPhotoCount(),
        'created'    => $album->getPublishedAt(),
        'updated'    => $album->getUpdateAt()
    ]);
}

public function insert_private_album(Album $album): bool
{
    $sql = "INSERT INTO album 
        (title, visibility, photo_cover_url, photo_count, created_at, updated_at) 
        VALUES (:title, :visibility, :cover, :count, :created, :updated)";

    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([
        'title'      => $album->getName(),
        'visibility' => 0,
        'cover'      => $album->getCover(),
        'count'      => $album->getPhotoCount(),
        'created'    => $album->getPublishedAt(),
        'updated'    => $album->getUpdateAt()
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

}
<?php

require_once 'db_con.php';
require_once 'Post.php';

class Post_Repo {

    private PDO $pdo;

    public function __construct() {
        $db = new ConectiontDb();
        $this->pdo = $db->getConnection();
    }

    public function fetch(int $id): ?Post {
        $stmt = $this->pdo->prepare("SELECT * FROM Post WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            
            return null;

        }

         return new Post($data['id'],$data['user_id'],$data['title'],$data['description'],$data['file_path'],$data['status'],$data['views_count'],$data['published_at'],$data['created_at'],$data['updated_at']);
    }

    public function fetchAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM Post");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];

        foreach ($rows as $data) {
            $posts[] = new Post($data['id'],$data['user_id'],$data['title'],$data['description'],$data['file_path'],$data['status'],$data['views_count'],$data['published_at'],$data['created_at'],$data['updated_at']
            );
        }

        return $posts;
    }
}

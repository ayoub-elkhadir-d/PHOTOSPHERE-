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
  
    public function insert(Post $post): bool {
        $sql = "INSERT INTO Post (user_id, title, description, file_path, status, views_count, published_at, created_at, updated_at) 
                VALUES (:user_id, :title, :description, :file_path, :status, :views_count, :published_at, :created_at, :updated_at)";
        
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            'user_id'      => $post->getUserId(),
            'title'        => $post->getTitle(),
            'description'  => $post->getDescription(),
            'file_path'    => $post->getFilePath(),
            'status'       => $post->getStatus(),
            'views_count'  => $post->getViewsCount(),
            'published_at' => $post->getPublishedAt(),
            'created_at'   => $post->getCreatedAt(),
            'updated_at'   => $post->getUpdatedAt(),
        ]);
    }

  
    public function update(Post $post): bool {
        $sql = "UPDATE Post SET 
                user_id = :user_id, 
                title = :title, 
                description = :description, 
                file_path = :file_path, 
                status = :status, 
                views_count = :views_count, 
                published_at = :published_at, 
                updated_at = :updated_at 
                WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            'id'           => $post->getId(),
            'user_id'      => $post->getUserId(),
            'title'        => $post->getTitle(),
            'description'  => $post->getDescription(),
            'file_path'    => $post->getFilePath(),
            'status'       => $post->getStatus(),
            'views_count'  => $post->getViewsCount(),
            'published_at' => $post->getPublishedAt(),
            'updated_at'   => date('Y-m-d H:i:s'),
        ]);
    }

 
}

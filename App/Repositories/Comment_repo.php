<?php
require_once 'db_con.php';
require_once 'Comment.php';

class Comment_Repo implements RepositoryInterface{
    private PDO $pdo;

    public function __construct() {
        $db = new ConectiontDb();
        $this->pdo = $db->getConnection();
    }

    public function fetch(int $id): ?Comment {
        $stmt = $this->pdo->prepare("SELECT * FROM comment WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) return null;

        return new Comment(
            $data['id'],
            $data['user_id'],
            $data['post_id'],
            $data['content'],
            $data['created_at'],
            $data['updated_at']
        );
    }

    public function fetchAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM comment");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $comments = [];
        foreach ($rows as $data) {
            $comments[] = new Comment(
                $data['id'],
                $data['user_id'],
                $data['post_id'],
                $data['content'],
                $data['created_at'],
                $data['updated_at']
            );
        }
        return $comments;
    }

    public function insert(Comment $comment): bool {
        $sql = "INSERT INTO comment (user_id, post_id, content, created_at, updated_at) 
                VALUES (:u_id, :p_id, :content, :created, :updated)";
        
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            'u_id'    => $comment->getUserId(),
            'p_id'    => $comment->getPostId(),
            'content' => $comment->getContent(),
            'created' => $comment->getCreatedAt(),
            'updated' => $comment->getUpdatedAt()
        ]);
    }

    public function update(Comment $comment): bool {
        $sql = "UPDATE comment SET 
                content = :content, 
                updated_at = :updated 
                WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            'id'      => $comment->getId(),
            'content' => $comment->getContent(),
            'updated' => date('Y-m-d H:i:s')
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM comment WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
<?php

require_once __DIR__ . '/../../Config/DataBase/db_con.php';
require_once __DIR__ . '/../Entities/Likes.php';

class Likes_Repo
{
    private PDO $pdo;

    public function __construct()
    {
        $db = new ConectiontDb();
        $this->pdo = $db->getConnection();
    }

    public function add(Like $like): bool
    {
        $sql = "INSERT INTO likes (user_id, post_id, created_at)
                VALUES (:user, :post, :created)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'user'    => $like->getUserId(),
            'post'    => $like->getPostId(),
            'created' => $like->getCreatedAt()
        ]);
    }
}

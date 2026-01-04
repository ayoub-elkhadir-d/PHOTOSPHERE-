<?php

class Like
{
    protected int $id;
    protected int $user_id;
    protected int $post_id;
    protected string $created_at;

    public function __construct(
        int $id,
        int $user_id,
        int $post_id,
        string $created_at
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->created_at = $created_at;
    }

   
    public function getId(): int {
        return $this->id;
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function getPostId(): int {
        return $this->post_id;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }
}

<?php

class Comment {
    protected int $id;
    protected int $user_id;  
    protected int $post_id;   
    protected string $content;
    protected string $created_at;
    protected ?string $updated_at;

    public function __construct(
        int $id, 
        int $user_id, 
        int $post_id, 
        string $content, 
        string $created_at, 
        ?string $updated_at = null
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->content = $content;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
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
        
    public function getContent(): string {
         return $this->content; 
        }
        
    public function getCreatedAt(): string {
         return $this->created_at; 
        }
        
    public function getUpdatedAt(): ?string {
         return $this->updated_at; 
        }
        
    public function setContent(string $content): void {
         $this->content = $content; 
        }
    public function setUpdatedAt(?string $updated_at): void {
         $this->updated_at = $updated_at; 
        }
}
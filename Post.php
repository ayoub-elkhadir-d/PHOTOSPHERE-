<?php
require_once 'Post_repo.php';
 $obj = new Post_repo();
class Post {

    protected int $id;
    protected int $user_id;
    protected string $title;
    protected string $description;
    protected string $file_path;
    protected string $status;
    protected int $views_count;
    protected ?string $published_at;
    protected string $created_at;
    protected ?string $updated_at;

    public function __construct(
        int $id,
        int $user_id,
        string $title,
        string $description,
        string $file_path,
        string $status,
        int $views_count,
        ?string $published_at,
        string $created_at,
        ?string $updated_at
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->file_path = $file_path;
        $this->status = $status;
        $this->views_count = $views_count;
        $this->published_at = $published_at;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }



    public function getId(): int {
        return $this->id;
    }

    public function getUserId(): int {
        return $this->user_id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getFilePath(): string {
        return $this->file_path;
    }

    public function getStatus(): string {
        return $this->status;
    }
    public function setStatus($status) {
         $this->status = $status;
    }

    public function getViewsCount(): int {
        return $this->views_count;
    }

    public function getPublishedAt(): ?string {
        return $this->published_at;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?string {
        return $this->updated_at;
    }


public function publish(Post_Repo $repo,$id) {
   $post = $repo -> fetch($id);
    $post->setStatus("dublished");
    $post->published_at = date('Y-m-d H:i:s');
    return $repo->update($post);
}
}

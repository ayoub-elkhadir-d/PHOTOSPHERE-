<?php

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

    public function __construct(int $id,int $user_id,string $title,string $description,string $file_path,string $status,int $views_count,?string $published_at,string $created_at,?string $updated_at) 
    {
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
}

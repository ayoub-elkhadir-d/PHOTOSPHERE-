<?php  

require_once __DIR__ . '/../Repositories/Album_repo.php';
class Album {
    protected int $id;
    protected string $name;
    protected string $desc;
    protected bool $public;
    protected string $cover;
    protected int $photoCount;
    protected string $publishedAt;
    protected string $updateAt;
    protected string $created_at;

    public function __construct(int $id,string $name,string $desc,string $cover,int $photoCount,string $publishedAt,string $updateAt,string $created_at) {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->cover = $cover;
        $this->photoCount = $photoCount;
        $this->publishedAt = $publishedAt;
        $this->updateAt = $updateAt;
        $this->created_at = $created_at;
    }


    public function getId(): int {
        
        return $this->id; 
    
    }
    public function getName(): string {
        
        return $this->name; 
    
    }
    public function getDescription(): string {
        
        return $this->desc; 
    
    }
    public function isPublic(): bool {
        
        return $this->public; 
    
    }
    public function getCover(): string {
        
        return $this->cover; 
    
    }
    public function getPhotoCount(): int {
        
        return $this->photoCount; 
    
    }
    public function getPublishedAt(): string {
        
        return $this->publishedAt; 
    
    }
    public function getUpdateAt(): string {
        
        return $this->updateAt; 
    
    }

    public function setName(string $name): void {
        
        $this->name = $name; 
    
    }
    public function setPublic(bool $public): void {
        
        $this->public = $public; 
    
    }
    public function setCover(string $cover): void {
        
        $this->cover = $cover; 
    
    }
    public function setPhotoCount(int $count): void {
        
        $this->photoCount = $count; 
    
    }
    public function setUpdateAt(string $date): void {
        
        $this->updateAt = $date; 
    
    }

    public function AddPhoto(Photo $photo): bool {
        
        return true;
    }

    public function RemovePhoto(Photo $photo): bool {
    
        return true;
    }
}


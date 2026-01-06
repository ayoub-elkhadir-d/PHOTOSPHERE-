<?php



trait TimestampableTrait
{
    protected  $createdAt;
    protected  $updatedAt;

 
    public function initializeTimestamps(): void
    {
    
    }

  
    public function updateTimestamps(): void
    {
        $this->updatedAt = new DateTime();
    }

  
    public function getCreatedAt()
    {
     
    }

 
    public function getUpdatedAt()
    {

    }
}
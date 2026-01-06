<?php


trait TaggableTrait
{
    protected array $tags = [];

    protected function normalizeTag(string $tag): string
    {
     
        return strtolower(trim($tag));
    }

    public function addTag(string $tag): void
    {
        $tag = $this->normalizeTag($tag);

     
        if (!in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
        }
    }

    public function removeTag(string $tag): void
    {
        $tag = $this->normalizeTag($tag);

     
        foreach ($this->tags as $index => $value) {
            if ($value === $tag) {
                unset($this->tags[$index]);
            }
        }

    
    
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function hasTag(string $tag): bool
    {
        $tag = $this->normalizeTag($tag);

        foreach ($this->tags as $value) {
            if ($value === $tag) {
                return true;
            }
        }
        return false;
    }


    public function clearTags(): void
    {
        $this->tags = [];
    }


 

    public function hasAnyTag(array $required): bool
    {
        foreach ($required as $tag) {
            if ($this->hasTag($tag)) {
                return true;
            }
        }
        return false;
    }
}
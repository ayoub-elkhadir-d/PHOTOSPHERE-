<?php

trait TaggableTrait {
protected $tableau_tags =[];


    public function addTag(string $tag): void{
        if (!in_array($tag, $tags)) {
            array_push($tableau_tags,$tag);
            }


    }

    public function removeTag(string $tag): void{
        foreach($tableau_tags as $tags){
            if($tags == $tag){
            unset($tags);
            }
        }

    }
    public function getTags(): array{
    foreach($tableau_tags as $tag){
        return $tag;
    }

    }
    public function hasTag(string $tag): bool{

    }
    public function clearTags(): void{
    unset($tableau_tags);
    }

  function normalizeTag(string $tag): string
    {
        return strtolower(trim($tag));
    }


}
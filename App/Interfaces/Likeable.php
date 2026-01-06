<?php

interface Likeable   {

public function  addLike(Like $like): bool;
public function  removeLike(int $userId): bool;

public function  isLikedBy(int $userId): bool;

public function  getLikeCount(): int;

public function  getLikedBy(): array;
}
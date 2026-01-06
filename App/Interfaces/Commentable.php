<?php
Interface Commentable {
public function  getComment(int $id): ?Comment;
public function  updateComment(Comment $comment): bool;
public function  addComment(Comment $comment): bool;
public function  removeComment(int $id): bool;
public function  getComments(): array;
public function  getCommentCount(): int;

}
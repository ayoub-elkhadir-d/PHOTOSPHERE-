<?php 


require_once __DIR__ . '/App/Repositories/User_Repo.php';
require_once __DIR__ . '/App/Repositories/Post_repo.php';
require_once __DIR__ . '/App/Repositories/Comment_repo.php';

 $obj7 = new  BasicUser(11,'ayoub123','dfghjklmù*','kjhg@hgg.com,','kjhbgvc','Admin');

 $obj = new Comment_repo();
 $pst_repo = new Post_repo();
 $obj2 = new Post(0,1,"Getting Started with10000
8000","This is a description of the post.","images/post01.jpg","published",0 ,date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),null);
// print_r($obj->update_user(new User(11,'ayoub123','dfghjklmù*','kjhg@hgg.com,','kjhbgvc','Admin')));
$newComment = new Comment(
 0,
 5,
 7,
 "This is a great post!",
 date('Y-m-d H:i:s'),
 null                
);
 print_r($obj7->addPost($obj2));

 print_r($pst_repo->fetchAll());



?>
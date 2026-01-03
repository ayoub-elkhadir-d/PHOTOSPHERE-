<?php 
require_once 'User_Repo.php';
require_once 'Post_repo.php';
require_once 'Comment_repo.php';
require_once 'Post.php';

// $obj = new User_Repo();
 $obj = new Comment_repo();
 $obj2 = new Post(0,1,"Getting Started with PHP2","This is a description of the post.","images/post01.jpg","published",0 ,date('Y-m-d H:i:s'), date('Y-m-d H:i:s'),null);
// print_r($obj->update_user(new User(11,'ayoub123','dfghjklmù*','kjhg@hgg.com,','kjhbgvc','Admin')));

//  print_r($obj2->Archive($obj,14));

 print_r($obj->fetchAll());



?>
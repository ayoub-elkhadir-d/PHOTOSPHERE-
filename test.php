<?php 
require_once 'User_Repo.php';
require_once 'Post_repo.php';

// $obj = new User_Repo();
 $obj = new Post_repo();
// print_r($obj->update_user(new User(11,'ayoub123','dfghjklmù*','kjhg@hgg.com,','kjhbgvc','Admin')));
 print_r($obj->fetchAll());




?>
<?php 
require_once 'User_Repo.php';

$obj = new User_Repo();
print_r($obj->update_user(new User(11,'ayoub123','','kjhg@hgg.com,','kjhbgvc','Admin')));
print_r($obj->fetchAll());


?>
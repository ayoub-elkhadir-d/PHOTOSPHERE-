<?php 
require_once 'User_Repo.php';

$obj = new User_Repo();
print_r($obj->Add_User(new User(15,'ayoub','ggh','kjhg@hgg.com,','kjhbgvc','Admin')));
print_r($obj->fetchAll());


?>
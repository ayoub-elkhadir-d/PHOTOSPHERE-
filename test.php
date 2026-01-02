<?php 
require_once 'User_Repo.php';

$obj = new User_Repo();
print_r($obj->fetchAll());


?>
<?php

class Post{ 
protected $id ;
protected $user_id ;
protected $title ;
protected $description ;
protected $file_path ;
protected $status ;
protected $views_count ;
protected $published_at ;
protected $created_at ;
protected $updated_at ;

   function __contstruct($id ,$user_id ,$title ,$description ){
    $this -> $id = $id;
    $this -> $user_id =$user_id;
    $this -> $title = $title; 
    $this -> $description = $description;
    $this -> $file_path = $file_path;
    $this -> $status = $status;
    $this -> $views_count = $views_count;
    $this -> $published_at = $published_at;
    $this -> $created_at =$created_at;
    $this -> $updated_at =$updated_at;
   }

}


?>
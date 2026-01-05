<?php  
require_once 'BasicUser.php';
class ProUser extends BasicUser{

    public function getRole(){
         return "ProUser";
       }

  function addPrivateAlbum(Album $alb){
     $albumrepo = new Album_repo();
     $albumrepo->insert_private_album($alb);
    } 

}

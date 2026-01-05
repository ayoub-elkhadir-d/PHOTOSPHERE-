<?php  
require_once 'BasicUser.php';
class ProUser extends BasicUser{
  
  protected $start_sub;
  protected $end_sub;
 
    public function getRole(){
         return "ProUser";
       }

  function addPrivateAlbum(Album $alb){
     $albumrepo = new Album_repo();
     $albumrepo->insert_private_album($alb);
    } 

}

<?php 
require_once __DIR__ . '/../Repositories/Comment_repo.php';
require_once __DIR__ . '/../Repositories/Post_repo.php';
 

abstract class User{
    protected $id;
    protected $name;
    protected $username;
    protected $email;
    protected $password;
    protected $role;

    function __construct($id,$name,$username,$email,$password,$role){
       $this->id=$id;
       $this->name=$name;
       $this->username=$username;
       $this->email=$email;
       $this->password=$password;
       $this->role=$role;
    }

   public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getName()
    {
        return $this->name;
    }

  public abstract  function getRole();

    public function getPassword()
    {
        return $this->password;
    }


}

class BasicUser extends User{

       public function getRole(){
         return "basic";
       }

    function addComment(Comment $cmt){

      $comment_repo = new Comment_repo();

      $comment_repo->insert($cmt);

    }

    function addPost(Post $pst){

      $post_repo = new Post_repo();

      $post_repo->insert($pst);

    }

    function addPublicAlbum(Album $alb){
     $albumrepo = new Album_repo();
     $albumrepo->insert_public_album($alb);

    }

    public function publish(Post_Repo $repo,$id) {
    $post = $repo -> fetch($id);
        $post->setStatus("published");
        $post->published_at = date('Y-m-d H:i:s');
        return $repo->update($post);
    }

}
class ProUser extends BasicUser{

  function addPrivateAlbum(Album $alb){
     $albumrepo = new Album_repo();
     $albumrepo->insert_private_album($alb);

    } 
}

?>
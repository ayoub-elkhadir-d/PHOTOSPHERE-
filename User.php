<?php 
require_once 'Comment_repo.php';
require_once 'Post_repo.php';
 

class User{
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
    public function getRole()
    {
        return $this->role;
    }
    public function getPassword()
    {
        return $this->password;
    }


}

class BasicUser extends User{

    function addComment(Comment $cmt){

      $comment_repo = new Comment_repo();

      $comment_repo->insert($cmt);

    }
    
    function addPost(Post $pst){

      $post_repo = new Post_repo();

      $post_repo->insert($pst);

    }

public function publish(Post_Repo $repo,$id) {
   $post = $repo -> fetch($id);
    $post->setStatus("published");
    $post->published_at = date('Y-m-d H:i:s');
    return $repo->update($post);
}

}

?>
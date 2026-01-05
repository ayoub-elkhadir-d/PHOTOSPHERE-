<?php 
require_once __DIR__ . '/../Repositories/Comment_repo.php';
require_once __DIR__ . '/../Repositories/Post_repo.php';
require_once __DIR__ . '/../Repositories/Likes_repo.php';
require_once __DIR__ . '/../Repositories/User_Repo.php';
 

abstract class User {
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
public abstract function login($username,$password);

}



?>
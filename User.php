<?php 
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

     public function setUsername($username)
    {
        $this->username=$username;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getType()
    {
        return $this->role;
    }

}

?>
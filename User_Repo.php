<?php 

require_once 'db_con.php';
require_once 'User.php';

class User_Repo{
private PDO $pdo ;
function __construct(){
$obj = new ConectiontDb();
$this ->$pdo =$obj->getConnection();

}
   public function find($id):User
    {
        $stmt = $this->$pdo->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->execute(['id' => $id]);
       $data = $stmt->fetch();
        
        if (!$data) {
            return null;
        }
        
        return new User($data['id'], $data['name'], $data['username'],$data['email'],$data['password'],$data['role']);

    }


    }

?>
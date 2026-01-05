<?php 

require_once __DIR__ . '/../../Config/DataBase/db_con.php';
require_once __DIR__ . '/../Entities/User.php';

class User_Repo implements RepositoryInterface{
private PDO $pdo ;
function __construct(){
$obj = new ConectiontDb();
$this ->pdo =$obj->getConnection();
}
   public function fetch($id):?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->execute(['id' => $id]);
       $data = $stmt->fetch();
 
        if (!$data) {
            return null;
        }

        return new BasicUser($data['id'], $data['name'], $data['username'],$data['email'],$data['password'],$data['role']);

    }

   public function fetchAll():?array
    {
       $users = [];
        $stmt = $this->pdo->prepare("SELECT * FROM user");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            return null;
        }
        
        foreach($data as $data){

             $user =new BasicUser($data['id'], $data['name'], $data['username'],$data['email'],$data['password'],$data['role']);
            $users[] = $user;
        }
        
        return $users;

    }
    public function Add_User(User $user){
          $stmt = $this->pdo->prepare("
                INSERT INTO user (name, username, email, password,role,created_at)
                VALUES (:name, :username, :email,:password,:role, NOW())
            ");
           $stmt->execute([
            'name' => $user->getName(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        
        ]);
    }
    function update_user(User $user){
        $stmt = $this->pdo->prepare("UPDATE user SET name = :name,username = :username,email = :email,password = :password,role = :roleWHERE id = :id");

             $stmt->execute([
            'name' => $user->getName(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole(),
            'id' => $user->getId()
        ]);
    }

    public function delete(int $id){}

      public function login($username,$pass){
        $stmt = $this->pdo->prepare("Select * from user  WHERE username = :username and password = :password");
         $stmt->execute([
            'username' => $username,
            'password' => $password]);
            
          $data = $stmt->fetch();
      }

    }

?>
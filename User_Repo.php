<?php 

require_once 'db_con.php';
require_once 'User.php';

class User_Repo{
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
        return new User($data['id'], $data['name'], $data['username'],$data['email'],$data['password'],$data['role']);
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
             $user =new User($data['id'], $data['name'], $data['username'],$data['email'],$data['password'],$data['role']);
           
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
        $stmt = $this->pdo->prepare("
                UPDATE user SET 
                name = :name,
                username = :username,
                email = :email,
                password = :password,
                role = :role
                 WHERE id = :id
            ");

             $stmt->execute([
            'name' => $user->getName(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole(),
            'id' => $user->getId()
        
        ]);

    }
      function view_all_posts(){
        
      }

    }

?>
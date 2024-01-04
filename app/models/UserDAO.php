<?php
require_once 'User.php';

class UserDAO
{
    private $conn;
    private User $user;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->user = new User();
    }

    public function signup(User $user){
        $name = $user->getName();
        $email = $user->getEmail();
        $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $role = $user->getRole();
        
        if($this->verifyUserByEmail($email) == true){
            $stmt = $this->conn->prepare("INSERT INTO users (userName, userEmail, userPassword, userRole) VALUES (:name, :email, :password, :role)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
    
            $stmt->execute();
            return true;
        } else {
            return false;
        }

    }

    public function verifyUser(User $user)
    {
        $email = $user->getEmail();
        $password = $user->getPassword();
        $role = $user->getRole();
        // echo $email;
        // echo $password;
        
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE userEmail = :email");
    
        $stmt->bindParam(':email', $email);    
        
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
     
        if ($result && password_verify($password, $result['userPassword'])) {
            return $result;
        }else{
            return false;
        }
    }
    public function verifyUserByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE userEmail = :email");
    
        $stmt->bindParam(':email', $email);    
        
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
     
        if ($result == false) {
            return true;
        }else{
             
            return false;
        }
    }

    public function selectLastUser() {
        $stmt = $this->conn->prepare("SELECT * FROM users ORDER BY userId LIMIT 1");
            
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}

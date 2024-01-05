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
        $image = $user->setImage("default_profile.png");
        
        if($this->verifyUserByEmail($email) == true){
            $stmt = $this->conn->prepare("INSERT INTO users (userName, userEmail, userImage,userPassword, userRole) VALUES (:name, :email, :image,:password, :role)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':image', $image);
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
        
        $validation = false;

        if ($result != false) {
            $validation = true;
        }

        if ($validation && password_verify($password, $result['userPassword'])) {
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



    // get user information 

    public function getUserInfo(User $user)
    {
        $userId = $user->getId();
    
        try {
    
            $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE userId = ?");
            $stmt->bindParam(1, $userId, PDO::PARAM_INT);
            $stmt->execute();
    
            $rows = $stmt->rowCount();
    
            if ($rows > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user = new User();
                $user->setEmail($row['userEmail']);
                
                // Check if the image is null
                $user->setImage($row['userImage'] ?? '6596afe3182a6_profile_pic.png');
                
                $user->setName($row['userName']);
                $user->setId($row['userId']);
    
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log("Error in UserModel: " . $e->getMessage());
            return null;
        }
    }
    

    public function updateProfile($userId, $newUserName, $newUserImage)
    {
        try {
            $query = "UPDATE `users` SET `userName`=?, `userImage`=? WHERE `userId`=?";
            $stmt = $this->conn->prepare($query);

            if ($stmt) {
                $stmt->bindParam(1, $newUserName, PDO::PARAM_STR);
                $stmt->bindParam(2, $newUserImage, PDO::PARAM_STR);
                $stmt->bindParam(3, $userId, PDO::PARAM_INT);

                $stmt->execute();

                $rowCount = $stmt->rowCount();
                if ($rowCount > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo "Error preparing statement: ";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error updating profile: " . $e->getMessage();
            return false;
        }
    }
    public function updateProfileName($userId, $newUserName)
    {
        try {
            $query = "UPDATE `users` SET `userName`=? WHERE `userId`=?";
            $stmt = $this->conn->prepare($query);
            if ($stmt) {
                $stmt->bindParam(1, $newUserName, PDO::PARAM_STR);
                $stmt->bindParam(2, $userId, PDO::PARAM_INT);

                $stmt->execute();
                return true;
            } else {
                echo "Error preparing statement: ";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error updating profile: " . $e->getMessage();
            return false;
        }
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
    public function updatePassword(User $user) {
        try {
            $email = $user->getEmail();
            $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $query = "UPDATE `users` SET `userPassword`=:userPassword WHERE `userEmail`=:userEmail";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':userEmail', $email, PDO::PARAM_STR);
            $stmt->bindParam(':userPassword', $password, PDO::PARAM_STR);
            if ($stmt->execute()) {
               
                return true;
            } else {
                echo "Error preparing statement: ";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error updating profile: " . $e->getMessage();
            return false;
        }
    }
}

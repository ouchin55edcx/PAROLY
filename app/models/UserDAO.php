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

    public function verifyUser(User $user)
    {
        $email = $user->getEmail();
        $password = $user->getPassword();

        // LOGIC 
        // $stmt = $this->conn->prepare("SELECT FROM");
        // Returns object of user

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
                $user->setImage($row['userImage']);
                $user->setName($row['userName']);
                $user->setId($row['userId']);

                return $user;
            } else return false;
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
}

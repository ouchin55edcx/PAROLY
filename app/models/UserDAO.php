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

    public function getUserInfo()
    {
        try {
            $query = "SELECT `userName`, `userEmail`,  `userImage` FROM `users` WHERE userId = 1";
            $result = $this->conn->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            $user->setEmail($row['userEmail']);
            $user->setImage($row['userImage']);
            $user->setName($row['userName']);

            return $user;
        } catch (Exception $e) {
            error_log("Error in UserModel: " . $e->getMessage());
            return null;
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

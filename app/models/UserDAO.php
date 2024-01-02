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

    public function registre(User $user){
        
    }
    public function verifyUser(User $user)
    {
        $email = $user->getEmail();
        $password = $user->getPassword();

        // LOGIC 
        // $stmt = $this->conn->prepare("SELECT FROM");
        // Returns object of user
        return true;
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

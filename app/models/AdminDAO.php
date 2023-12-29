<?php
require_once 'Admin.php';

class AdminDAO
{
    private $conn;
    private Admin $admin;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->admin = new Admin();
    }

    public function login(){
        header('Location:/paroly/public/dashboard/index');
    }

    /**
     * Get the value of admin
     */ 
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */ 
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }
}

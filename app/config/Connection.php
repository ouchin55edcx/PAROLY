<?php
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
session_start();

class Connection
{
    private static $instance;
    private $host = "localhost:3308";
    private $user = "root";
    private $password = "";
    private $database = "paroly2";
    private $conn;
    // private $stmt;

    public function __construct()
    {
        try {
            $dbh = "mysql:host={$this->host};dbname={$this->database}";
            $this->conn = new PDO($dbh, $this->user, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }
}
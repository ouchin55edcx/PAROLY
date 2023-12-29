<?php
require_once 'Client.php';

class ClientDAO
{
    private $conn;
    private Client $client;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->client = new Client();
    }

    public function login(){
        header('Location:/paroly/public/home/index');
    }

    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }
}

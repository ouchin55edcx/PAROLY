<?php
require_once 'Interactions.php';

class InteractionsDAO
{

    private $conn;
    private Interactions $interaction;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->interaction = new Interactions();
    }

    /**
     * Get the value of interaction
     */ 
    public function getInteraction()
    {
        return $this->interaction;
    }
}

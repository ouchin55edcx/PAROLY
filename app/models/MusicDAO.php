<?php
require_once 'Music.php';

class MusicDAO
{
    private $conn;
    private Music $music;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->music = new Music();
    }

    /**
     * Get the value of music
     */ 
    public function getMusic()
    {
        return $this->music;
    }
}
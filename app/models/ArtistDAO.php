<?php
require_once 'Artist.php';

class ArtistDAO
{
    private $conn;
    private Artist $artist;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->artist = new Artist();
    }

    public function login(){
        header('Location:/paroly/public/home/index');
    }

    /**
     * Get the value of artist
     */ 
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set the value of artist
     *
     * @return  self
     */ 
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }
}

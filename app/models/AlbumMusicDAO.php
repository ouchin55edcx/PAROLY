<?php
require_once 'AlbumMusic.php';

class AlbumMusicDAO
{

    private $conn;
    private AlbumMusic $albumMusic;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->albumMusic = new AlbumMusic();
    }


  

    /**
     * Get the value of albumMusic
     */ 
    public function getAlbumMusic()
    {
        return $this->albumMusic;
    }
}

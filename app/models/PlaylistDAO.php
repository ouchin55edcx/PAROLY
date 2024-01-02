<?php
require_once 'Playlist.php';

class PlaylistDAO
{
    private $conn;
    private Playlist $playlist;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->playlist = new Playlist();
    }

    /**
     * Get the value of playlist
     */ 
    public function getPlaylist()
    {
        return $this->playlist;
    }
}
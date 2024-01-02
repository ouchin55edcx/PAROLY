<?php
require_once 'Album.php';

class AlbumDAO
{
    private $conn;
    private Album $album;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->album = new Album();
    }



    /**
     * Get the value of album
     */
    public function getAlbum()
    {
        return $this->album;
    }
}

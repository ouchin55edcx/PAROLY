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

    public function getMusicByIdMusic($id) {
        $query = "SELECT * FROM music m, genres g WHERE musicId = :musicId AND m.genreId=g.genreId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':musicId', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
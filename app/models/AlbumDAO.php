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
        try {
            $query = 'SELECT * FROM albums';
            $stmt = $this->conn->query($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            echo 'Data Makat jich';
        }
    }

    public function InsertionAlbum($albumname , $albumimg , $albumdate , $userid){
        try{
            $query = $this->conn->prepare('INSERT INTO albums (albumName , albumImage , albumDate , userId) VALUES (:albumName ,:albumImage ,:albumDate ,:userId)');
            $query->bindParam(':albumName', $albumname);
            $query->bindParam(':albumImage', $albumimg);
            $query->bindParam(':albumDate', $albumdate);
            $query->bindParam(':userId', $userid);
            $query->execute();
        }catch (Exception $e){
            echo 'Data Makat Dkholch dachi 3lach khasek t9ad Had lerror' . $e->getMessage();
        }
    }
}
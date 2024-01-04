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
    public function getMusic(Music $music){
       $name = $music->getName();
       $musicimg = $music->getImage();
       $musicdate = $music->getDate();
       $userId = $music->getId();
        $genreId = $music->getGenre();

  
        try {
            $query = $this->conn->prepare('INSERT INTO music (musicName , musicImage , musicDate , userId ,genreId) VALUES (:musicName ,:musicImage ,:musicDate ,:userId , :genreId)');
            $query->bindParam(':musicName', $name);
            $query->bindParam(':musicImage', $musicimg);
            $query->bindParam(':musicDate', $musicdate);
            $query->bindParam(':userId', $userId);
            $query->bindParam(':genreId', $genreId);
            $query->execute();
        } catch (Exception $e) {
            echo 'Data Makat Dkholch dachi 3lach khasek t9ad Had lerror' . $e->getMessage();
        }
    
    }

   
}
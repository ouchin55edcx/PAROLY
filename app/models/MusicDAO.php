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

    public function getLastMusic()
    {
        $query = "SELECT * FROM music JOIN users ON music.userId = users.userId JOIN genres ON music.genreId = genres.genreId ORDER BY musicId DESC LIMIT 4";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        $musics = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $music = new Music();
            $music->getUser()->setId($row['userId']);
            $music->getUser()->setName($row['userName']);
            $music->getGenre()->setName($row['genreName']);
            $music->setId($row['musicId']);
            $music->setName($row['musicName']);
            $music->setImage($row['musicImage']);
            $music->setDate($row['musicDate']);
            array_push($musics, $music);
        }
        return $musics;
    }

    public function searchMusic(Music $music)
    {
        $musicName = $music->getName();

        $stmt = $this->conn->prepare("SELECT * FROM music JOIN users ON music.userId = users.userId JOIN genres ON music.genreId = genres.genreId WHERE musicName LIKE CONCAT('%', ? ,'%')");
        $stmt->bindValue(1, $musicName, PDO::PARAM_STR);
        $stmt->execute();

        $musics = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $music = new Music();
            $music->setId($row['musicId']);
            $music->setName($row['musicName']);
            $music->setImage($row['musicImage']);
            $music->setDate($row['musicDate']);
            $music->getGenre()->setName($row['genreName']);
            $music->getUser()->setName($row['userName']);
            array_push($musics, $music);
        }
        return $musics;
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

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
        $query = "SELECT * FROM music , users , genres WHERE users.userId = music.userId and genres.genreId = music.genreId;";
        $result = $this->conn->query($query);

        $songs = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $song = new Music();
            $song->setId($row['musicId']);
            $song->setName($row['musicName']);
            $song->setImage($row['musicImage']);
            $song->setDate($row['musicDate']);
            $song->getGenre()->setName($row['genreName']);
            $song->getUser()->setName($row['userName']);

            array_push($songs, $song);
        }
        return $songs;
    }
    public function getSongCount()
    {
        $query = "SELECT COUNT(*) as songCount FROM music";
        $result = $this->conn->query($query);

        if ($result) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['songCount'];
        } else {
            return 0;
        }
    }

}
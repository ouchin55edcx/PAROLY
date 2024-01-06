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

    public function login()
    {
        header('Location:/paroly/public/home/index');
    }

    public function searchArtist(Artist $artist)
    {
        $artistName = $artist->getName();
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE userName LIKE CONCAT('%', ? ,'%') AND userRole = 'artist'");
        $stmt->bindValue(1, $artistName, PDO::PARAM_STR);
        $stmt->execute();

        $artists = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $artist = new Artist();
            $artist->setId($row['userId']);
            $artist->setName($row['userName']);
            $artist->setImage($row['userImage']);
            array_push($artists, $artist);
        }
        return $artists;
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

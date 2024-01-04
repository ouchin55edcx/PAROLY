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

    public function getLastAlbums()
    {
        $query = "SELECT * FROM albums JOIN users ON albums.userId = users.userId ORDER BY albumId DESC LIMIT 4";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        $albums = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $album = new Album();
            $album->getUser()->setId($row['userId']);
            $album->getUser()->setName($row['userName']);
            $album->setId($row['albumId']);
            $album->setName($row['albumName']);
            $album->setImage($row['albumImage']);
            array_push($albums, $album);
        }
        return $albums;
    }



    /**
     * Get the value of album
     */
    public function getAlbum()
    {
        return $this->album;
    }
}

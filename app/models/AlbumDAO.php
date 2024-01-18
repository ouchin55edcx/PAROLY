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
            $album->setDate($row['albumDate']);
            array_push($albums, $album);
        }
        return $albums;
    }



    /**
     * Get the value of album
     */
    public function getAlbum()

    {
        try {
            $query = "SELECT * FROM albums ORDER BY albumDate DESC ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $albums = [];
            foreach ($result as $data) {
                $album = new Album();
                $album->setId($data['albumId']);
                $album->setName($data['albumName']);
                $album->setImage($data['albumImage']);
                $album->setDate($data['albumDate']);

                $albums[] = $album;
            }

            return $albums;
        } catch (PDOException $e) {
            echo'3afak: ' . $e->getMessage();
            return [];
        }
    }



    public function InsertionAlbum(Album $album){

        try {
            $albumname = $album->getName();
            $albumimg = $album->getImage();
            $albumdate = $album->getDate();

            $query = $this->conn->prepare('INSERT INTO albums (albumName, albumImage, albumDate ) VALUES (:albumName, :albumImage, :albumDate)');
            $query->bindParam(':albumName', $albumname, PDO::PARAM_STR);
            $query->bindParam(':albumImage', $albumimg, PDO::PARAM_STR);
            $query->bindParam(':albumDate', $albumdate, PDO::PARAM_STR);

            $query->execute();
        }catch (Exception $e){
            echo 'Data Makat Dkholch dachi 3lach khasek t9ad Had lerror' . $e->getMessage();
        }
    }
}
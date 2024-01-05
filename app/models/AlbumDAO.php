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

    public function getRecentAlbums($limit = 10)
    {
        try {
            $query = "SELECT * FROM albums ORDER BY albumDate DESC LIMIT :limit";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $albums = [];
            foreach ($result as $data) {
                $album = new Album();
                $album->setId($data['albumId']);
                $album->setName($data['albumName']);
                $album->setImage($data['albumImage']);
                $album->setDate($data['albumDate']);
                $user = new User();
                $user->setId($data['userId']);
                $album->getUser()->setId($user);

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
            $userid = $album->getUser()->getId();

            $query = $this->conn->prepare('INSERT INTO albums (albumName, albumImage, albumDate, userId) VALUES (:albumName, :albumImage, :albumDate, :userId)');
            $query->bindParam(':albumName', $albumname, PDO::PARAM_STR);
            $query->bindParam(':albumImage', $albumimg, PDO::PARAM_STR);
            $query->bindParam(':albumDate', $albumdate, PDO::PARAM_STR);
            $query->bindParam(':userId', $userid, PDO::PARAM_INT);

            $query->execute();
        }catch (Exception $e){
            echo 'Data Makat Dkholch dachi 3lach khasek t9ad Had lerror' . $e->getMessage();
        }
    }
}
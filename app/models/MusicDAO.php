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

    public function cerateMusic(Music $music)
    {
        $name = $music->getName();
        $musicimg = $music->getImage();
        $musicdate = $music->getDate();
        $userId = $music->getuser()->getId();
        $genreId = $music->getGenre()->getId();

        try {
            $query = $this->conn->prepare('INSERT INTO music (musicName , musicImage , musicDate , userId ,genreId) VALUES (:musicName ,:musicImage ,:musicDate ,:userId , :genreId)');
            $query->bindParam(':musicName', $name);
            $query->bindParam(':musicImage', $musicimg);
            $query->bindParam(':musicDate', $musicdate);
            $query->bindParam(':userId', $userId);
            $query->bindParam(':genreId', $genreId);
           return $query->execute();
        } catch (Exception $e) {
            echo 'Data Makat Dkholch dachi 3lach khasek t9ad Had lerror' . $e->getMessage();
            return false;
        }
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


    public function getMusic()
    {
        return $this->music;

    }


    public function getMusicByIdMusic() {
        try {
            $query = "SELECT music.* , users.userName FROM music JOIN users On users.userId = music.userId;
";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


            $musics = [];
            foreach ($result as $data) {
                $music = new Album();
                $music->setId($data['musicId']);
                $music->setName($data['musicName']);
                $music->setImage($data['musicImage']);
                $music->setDate($data['musicDate']);
                $music->getUser()->setName($data['userName']);

                $musics[] = $music;
            }

            return $musics;
        }catch (Exception $e){
            echo 'Nani Nani 3endek error'.$e->getMessage();
        }
    }





}


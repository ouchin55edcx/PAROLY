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
            $query->execute();
        } catch (Exception $e) {
            echo 'Data Makat Dkholch dachi 3lach khasek t9ad Had lerror' . $e->getMessage();
        }
    }


    public function getMusicByIdMusic()
    {
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
        } catch (Exception $e) {
            echo 'Nani Nani 3endek error' . $e->getMessage();
        }
    }
}
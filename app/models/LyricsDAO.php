<?php
require_once 'Lyrics.php';

class LyricsDAO
{

    private $conn;
    private Lyrics $lyrics;
    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->lyrics = new Lyrics();
    }

    public function getLyrics()
    {
        $query = "SELECT lyrics.*, artist.userName as artistUserName, client.userName as clientUserName, client.userEmail as email FROM lyrics JOIN users as artist ON lyrics.userId = artist.userId JOIN users as client ON lyrics.userId = client.userId where lyrics.isVerified = 0;";
        $result = $this->conn->query($query);

        $lyrics = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $newlyrics = new Lyrics();
            $newlyrics->getUser()->setName($row['clientUserName']);
            $newlyrics->getUser()->setEmail($row['email']);
            $newlyrics->setId($row['lyricsId']);
            $newlyrics->setContent($row['lyricsContent']);
            $newlyrics->setIsVerified($row['isVerified']);
            array_push($lyrics, $newlyrics);
        }
        return $lyrics;
    }
    public function verifier(Lyrics $lyrics){
        $lyricsId = $lyrics->getId();
        $query = "UPDATE lyrics SET isVerified = 1 WHERE lyricsId = :lyricsId";
        $statement = $this->conn->prepare($query);
        $statement->bindParam(':lyricsId', $lyricsId, PDO::PARAM_INT);
        $statement->execute();
    }
    public function deleteLyrics(Lyrics $lyrics){
        $lyricsId = $lyrics->getId();
        $query = "DELETE FROM lyrics WHERE lyricsId = :lyricsId";
        $statement = $this->conn->prepare($query);
        $statement->bindParam(':lyricsId', $lyricsId, PDO::PARAM_INT);
        $statement->execute();
    }


}

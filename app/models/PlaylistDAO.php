<?php
require_once 'Playlist.php';

class PlaylistDAO
{
    private $conn;
    private Playlist $playlist;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->playlist = new Playlist();
    }

    public function addPlaylist(Playlist $playlist)
    {
        $playlistName = $playlist->getName();
        $userId = $playlist->getUser()->getId();

        try {
            $query = "INSERT INTO `playlists`(`playlistName`, `userId`) VALUES (:playlistName, :userId)";
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':playlistName', $playlistName, PDO::PARAM_STR);
            $statement->bindParam(':userId', $userId, PDO::PARAM_INT);

            if ($statement->execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
            error_log("Error in UserModel - addPlaylist: " . $e->getMessage());
            return false;
        }
    }

    public function getLastsPlaylists(User $user)
    {

        $userId = $user->getId();

        $query = "SELECT * FROM playlists WHERE userId = :userId ORDER BY playlistId DESC LIMIT 4";
        $statement = $this->conn->prepare($query);
        $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
        $statement->execute();

        $playlists = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $playlist = new Playlist();
            $playlist->getUser()->setId($row['userId']);
            $playlist->setId($row['playlistId']);
            $playlist->setName($row['playlistName']);
            $playlist->setDesc($row['playlistDesc']);
            array_push($playlists, $playlist);
        }
        return $playlists;
    }

    // user admin 

    public function checkUser(Playlist $playlist) {
        $playlistId = $playlist->getId();
        $userId = $playlist->getUser()->getId();
    
        // Assuming you have a mysqli connection named $mysqli
        $query = "SELECT * FROM playlists WHERE playlistId = :playlistId AND userId = :userId";
        $statement = $this->conn->prepare($query);

        $statement->bindParam(':userId', $userId, PDO::PARAM_INT);
        $statement->bindParam(':playlistId', $playlistId, PDO::PARAM_INT);

        $statement->execute();
        $rows = $statement->rowCount();

        if($rows){
            return true ;
        }else return false ;


    }
    

    /**
     * Get the value of playlist
     */
    public function getPlaylist()
    {
        return $this->playlist;
    }
}

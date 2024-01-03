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

    public function getLastsPlaylists()
    {
        $query = "SELECT `playlistId`, `userId`, `playlistName` FROM `playlists` ORDER BY `playlistId` DESC LIMIT 3";
        $result = $this->conn->query($query);

        $playlists = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $playlist = new Playlist();
            $playlist->getUser()->setId($row['userId']);
            $playlist->setId($row['playlistId']);
            $playlist->setName($row['playlistName']);
            array_push($playlists, $playlist);
        }
        return $playlists;
    }


    /**
     * Get the value of playlist
     */
    public function getPlaylist()
    {
        return $this->playlist;
    }
}

<?php
require_once 'PlaylistMusic.php';

class PlaylistMusicDAO
{

    private $conn;
    private PlaylistMusic $playlistMusic;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->playlistMusic = new PlaylistMusic();
    }


    /**
     * Get the value of playlistMusic
     */
    public function getPlaylistMusic()
    {
        return $this->playlistMusic;
    }

    /**
     * Set the value of playlistMusic
     *
     * @return  self
     */
    public function setPlaylistMusic($playlistMusic)
    {
        $this->playlistMusic = $playlistMusic;

        return $this;
    }
    public function getMusicsIdByIdPlaylist($id) {
        $query = "SELECT * FROM playlists_music WHERE playlistId = :playlistId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':playlistId', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

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




    public function getFeaturedPlaylists()
    {
        $query = "SELECT * FROM playlists_music JOIN playlists on playlists_music.playlistId = playlists.playlistId JOIN music ON playlists_music.musicId = music.musicId WHERE playlists.userId = 1 ORDER BY playlists.playlistId DESC LIMIT 4";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        $playlists = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $playlist = new PlaylistMusic();
            $playlist->getPlaylist()->getUser()->setId($row['userId']);
            $playlist->getPlaylist()->setId($row['playlistId']);
            $playlist->getPlaylist()->setName($row['playlistName']);
            $playlist->getPlaylist()->setDesc($row['playlistDesc']);
            $playlist->getMusic()->setImage($row['musicImage']);
            array_push($playlists, $playlist);
        }
        return $playlists;
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
}

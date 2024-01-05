<?php
require_once 'Music.php';
require_once 'Playlist.php';

class PlaylistMusic {

    private $id;
    private Playlist $playlist;
    private Music $music;

    public function __construct()
    {
        $this->music = new Music();
        $this->playlist = new Playlist();
    }

    /**
     * Get the value of playlist
     */
    public function getPlaylist()
    {
        return $this->playlist;
    }

    /**
     * Get the value of music
     */
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

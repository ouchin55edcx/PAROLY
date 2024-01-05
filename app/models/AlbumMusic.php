<?php
require_once 'Music.php';
require_once 'Album.php';

class AlbumMusic {

    private $id;
    private Album $album;
    private Music $music;
    
    public function __construct()
    {
        $this->music = new Music();
        $this->album = new Album();
    }

 
    /**
     * Get the value of music
     */ 
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * Set the value of music
     *
     * @return  self
     */ 
    public function setMusic($music)
    {
        $this->music = $music;

        return $this;
    }

    /**
     * Get the value of album
     */ 
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set the value of album
     *
     * @return  self
     */ 
    public function setAlbum($album)
    {
        $this->album = $album;

        return $this;
    }
}
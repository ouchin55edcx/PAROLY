<?php
require_once 'Music.php';

class Lyrics
{
    private $id;
    private $content;
    private $isVerified;
    private Music $music;
    private User $user;
    private Genre $genre;


    public function __construct()
    {
        $this->music = new Music();
        $this->user = new User();
        $this->genre = new Genre();

    }
    public function getMusic()
    {
        return $this->music;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function getGenre()
    {
        return $this->genre;
    }
    public function setMusic($music)
    {
        $this->music = $music;
        return $this;
    }
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }
    public function getIsVerified()
    {
        return $this->isVerified;
    }
    public function setIsVerified($isVerified)
    {
        $this->isVerified = $isVerified;
        return $this;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

}

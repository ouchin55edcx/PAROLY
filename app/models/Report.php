<?php
require_once 'Lyrics.php';

class Report
{
    private $id;
    private $desc;
    private $isResolved;
    private Lyrics $lyrics;
    private User $user;

    public function __construct()
    {
        $this->lyrics = new Lyrics();
        $this->user = new User();
    }
    public function getLyrics()
    {
        return $this->lyrics;
    }
    public function setLyrics($lyrics)
    {
        $this->lyrics = $lyrics;
        return $this;
    }
    public function getUser()
    {
        return $this->lyrics;
    }
    public function setUser($user)
    {
        $this->$user = $user;
        return $this;
    }

    public function getIsResolved()
    {
        return $this->isResolved;
    }

    public function setIsResolved($isResolved)
    {
        $this->isResolved = $isResolved;

        return $this;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;

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

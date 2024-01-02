<?php
require_once 'Lyrics.php';
require_once 'User.php';

class Interactions
{
    private $id;
    private $type;
    private Lyrics $lyrics;
    private User $user;

    public function __construct()
    {
        $this->lyrics = new Lyrics();
        $this->user = new User();
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of lyrics
     */ 
    public function getLyrics()
    {
        return $this->lyrics;
    }

    /**
     * Set the value of lyrics
     *
     * @return  self
     */ 
    public function setLyrics($lyrics)
    {
        $this->lyrics = $lyrics;

        return $this;
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

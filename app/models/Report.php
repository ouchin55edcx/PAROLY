<?php
require_once 'Lyrics.php';

class Report
{
    private $id;
    private $desc;
    private $isResolved;
    private Lyrics $lyrics;

    public function __construct()
    {
        $this->lyrics = new Lyrics();
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
     * Get the value of isResolved
     */ 
    public function getIsResolved()
    {
        return $this->isResolved;
    }

    /**
     * Set the value of isResolved
     *
     * @return  self
     */ 
    public function setIsResolved($isResolved)
    {
        $this->isResolved = $isResolved;

        return $this;
    }

    /**
     * Get the value of desc
     */ 
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @return  self
     */ 
    public function setDesc($desc)
    {
        $this->desc = $desc;

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

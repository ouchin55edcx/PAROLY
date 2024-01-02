<?php
require_once 'Lyrics.php';

class LyricsDAO
{

    private $conn;
    private Lyrics $lyrics;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->lyrics = new Lyrics();
    }



    /**
     * Get the value of lyrics
     */
    public function getLyrics()
    {
        return $this->lyrics;
    }
}

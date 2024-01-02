<?php
require_once 'Genre.php';

class GenreDAO
{
    private $conn;
    private Genre $genre;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->genre = new Genre();
    }

    public function getGenres()
    {
        $stmt = $this->conn->prepare("SELECT * FROM genres");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $genres = array();
        while ($row) {
            $genre = new Genre();
            $genre->setId($row['genreId']);
            $genre->setName($row['genreName']);
            array_push($genres, $genre);
        }
        return $genres;
    }

    /**
     * Get the value of genre
     */
    public function getGenre()
    {
        return $this->genre;
    }
}

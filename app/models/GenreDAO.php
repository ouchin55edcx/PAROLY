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


    public function addGenre(Genre $genre)
    {
        $genreName = $genre->getName();
        try {
            $query = "INSERT INTO `genres` (`genreName`) VALUES (:genreName)";
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':genreName', $genreName, PDO::PARAM_STR);

            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Error in UserModel - addGenre: " . $e->getMessage());
            return false;
        }
    }






    public function getGenres()
    {
        $stmt = $this->conn->prepare("SELECT G.genreId, G.genreName, COUNT(M.musicId) AS musicCount FROM genres AS G LEFT JOIN music AS M ON G.genreId = M.genreId GROUP BY G.genreId, G.genreName;");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $genres = array();

        foreach ($rows as $row) {
            $genre = new Genre();
            $genre->setId($row['genreId']);
            $genre->setName($row['genreName']);
            $genres[] = [
                'id' => $genre->getId(),
                'name' => $genre->getName(),
                'musicCount' => $row['musicCount'],
            ];
        }

        return $genres;
    }
//            array_push($genres, $genre );


    /**
     * Get the value of genre
     */
    public function getGenre()
    {
        return $this->genre;
    }
}

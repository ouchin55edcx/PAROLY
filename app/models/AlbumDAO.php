<?php

require_once '../init.php';

class AlbumDAO{
    private $db;
    private $name;
    private $img;
    private $date;


    public function __construct(){
        $this->db = new Connection();
    }

    public function InsertAlbum($name , $img , $date , $userId){
        $query = 'INSERT INTO albums (albumName , albumImage, albumDate, userId) VALUES (:albumname , :albumimg ,:albumdate , :userid )';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':albumname' , $name);
        $stmt->bindParam(':albumimg' , $img);
        $stmt->bindParam(':albumdate' , $date);
        $stmt->bindParam(':userid' , $userId);
        $stmt->execute();

        return $stmt;
    }
}

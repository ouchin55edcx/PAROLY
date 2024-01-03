<?php
 //require_once 'models/AlbumDAO.php';
class Albums extends Controller
{
    private $albumdao;
    private $name;
    private $img;
    private $date;
    private $userId;
     public function __construct(){
     $this->albumdao = new AlbumDAO();
     }

    public function index(...$param)
    {
        // $this->albumdao = new AlbumDAO();
        //$this->albumdao->getAlbum();

        $this->view('albums', $param);
    }


    public function test()
    {
        echo 'test';
    }
    // public function InsertionAlbum($name, $img, $date, $userId)
    // {
    //     $this->albumdao->InsertAlbum($name, $img, $date, $userId);
    // }
}

$controller = new Albums();

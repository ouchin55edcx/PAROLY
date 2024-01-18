<?php
class Lyric extends Controller{
    private $LyricsDAO;
    public function __construct(){
        return $this->LyricsDAO = new LyricsDAO();

    }

    public function index(...$param)
    {

        if(isset($_POST['submitAlbum'])){
            $albume = new Album();
            $albume->setName($_POST['name']);
            $albume->setDate($_POST['date']);
            $albume->setImage($_POST['image']);
            $albume->getUser()->setId($_POST['iduser']);

        }

        $albums = $this->LyricsDAO->getRecentAlbums();

        $this->view('lyrics', ['lyrics' => $albums]);
    }


}


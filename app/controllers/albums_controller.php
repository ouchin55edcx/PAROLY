<?php
class Albums extends Controller{
    private $albumDAO;
    public function __construct(){
       return $this->albumDAO = new AlbumDAO();

    }

    public function index(...$param)
    {

        if(isset($_POST['submitAlbum'])){
            $albume = new Album();
            $albume->setName($_POST['name']);
            $albume->setDate($_POST['date']);
            $albume->setImage($_POST['image']);
            $albume->getUser()->setId($_POST['iduser']);
            $this->albumDAO->InsertionAlbum($albume);
        }

        $albums = $this->albumDAO->getRecentAlbums();

        $this->view('albums', ['albums' => $albums]);
    }


}


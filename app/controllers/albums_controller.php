<?php
class Albums extends Controller{
    private $albumDAO;
    private $music;
    public function __construct(){
        $this->albumDAO = new AlbumDAO();
        $this->music = new MusicDAO();
    }

    public function index(...$param)
    {

        if(isset($_POST['submitAlbum'])){
            $albume = new Album();
            $albume->setName($_POST['name']);
            $albume->setDate($_POST['date']);
            $albume->setImage($_POST['image']);
            $this->albumDAO->InsertionAlbum($albume);
        }

        $albums = $this->albumDAO->getAlbum();

        $this->view('albums', ['albums' => $albums]);
    }

public function albume(){
      $musics = $this->music->getMusic();
      $this->view('albummusic' , ['musics' => $musics ]);
}

}


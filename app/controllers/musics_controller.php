<?php
class Musics extends Controller
{

    public function index(...$param)
    {
        $musicDAO = new MusicDAO();


        if(isset($_POST['submitMusic'])){
        $music = new Music();
        $music->setName($_POST['name']);
        $music->setDate($_POST['date']);
        $music->setImage($_POST['image']);
        $music->getuser()->setId($_POST['iduser']);
        $music->getGenre()->setId($_POST['genre']);
        $musicDAO->cerateMusic( $music);
       }
        $musicDAO->getMusicByIdMusic();
        $this->view('music', ['' => $music ] );
    }
}
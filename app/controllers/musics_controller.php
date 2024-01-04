<?php
class Musics extends Controller
{

    private $music;

    public function __construct()
    {
        $this->music = new MusicDAO();
    }

    public function index(...$param)
    {
        $this->music->getMusic();
        if(isset($_POST['submitMusic'])){
            
        }
        $this->view('music', $param);
    }
}
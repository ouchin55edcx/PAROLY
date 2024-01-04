<?php
class Albums extends Controller{
    
private $album;

     public function __construct(){
         $this->album = new AlbumDAO();
     }

    public function index(...$param)
    {
        $this->album->getAlbum();

        if(isset($_POST['AddAlbum'])){
            $this->album->InsertionAlbum($albumdate , $albumdate , $albumname, $userid);
            
        }
        $this->view('albums', $param);
    }

}

$controller = new Albums();
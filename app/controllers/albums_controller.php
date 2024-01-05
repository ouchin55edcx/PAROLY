<?php
class Albums extends Controller{

    public function index(...$param)
    {
        $albumDAO = new AlbumDAO();
        if(isset($_POST['submitAlbum'])){
            $Album = new Album();
            $Album->setName($_POST['name']);
            $Album->setDate($_POST['date']);
            $Album->setImage($_POST['image']);
            $Album->getuser()->setId($_POST['iduser']);
            $albumDAO->InsertionAlbum( $Album);
        }

        $albums = $albumDAO->getAlbums();

        $this->view('albums', ['album' => $albums]);
    }

}

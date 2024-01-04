<?php 
class Playlistcon extends Controller{

    public function index($id)
{
    if(!isset($_SESSION['userId'])){
     header('location:/paroly/public/home/index');
     exit();
    }
    $playlistMusicDAO = new PlaylistMusicDAO();
    $musicDAO= new MusicDAO();
    $playlistMusics = $playlistMusicDAO->getMusicsIdByIdPlaylist($id);
    $musics=array();
    foreach ($playlistMusics as $playlistMusic) {
        $music = $musicDAO->getMusicByIdMusic($playlistMusic->musicId);
        array_push($musics,$music);
    }
    $data = [
        "musics"=>$musics
    ];
    $this->view('playlist',$data);
    // echo'<pre>';var_dump($data);die;

    // $playlist = new PlaylistDAO();
    // $playlist->getPlaylist()->setId($id);
    // $playlist->getPlaylist()->getUser()->setId($_SESSION['userId']);


    // $result = $playlist->checkUser($playlist->getPlaylist());
    // if($result){
    //     $playlistmusic = new PlaylistMusicDAO;
    //     $music = $playlistmusic->getmusic($playlist->getPlaylist());


    //     $this->view("playlist");
    // }else header('location:/paroly/public/home/index');
    
}






}







?>
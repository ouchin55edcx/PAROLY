<?php
class Playlistcon extends Controller
{

    public function index($id)
    {
        if (!isset($_SESSION['userId'])) {
            header('location:/paroly/public/home/index');
            exit();
        }
        $playlistMusicDAO = new PlaylistMusicDAO();
        $musicDAO = new MusicDAO();
        $users = new UserDAO();
        $playlist = new PlaylistDAO();
        $users->getUser()->setId($_SESSION['userId']);
        $user = $users->getUserInfo($users->getUser());
        $playlists = $playlist->getLastsPlaylists($users->getUser());
        $playlistMusics = $playlistMusicDAO->getMusicsIdByIdPlaylist($id);
        $musics = array();
        foreach ($playlistMusics as $playlistMusic) {
            $music = $musicDAO->getMusicByIdMusic($playlistMusic->musicId);
            array_push($musics, $music);
        }
        $data = ["musics" => $musics, "user" => $user, "playlists" => $playlists];
        $this->view('playlist', $data);
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

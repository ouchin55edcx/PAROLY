<?php


class Profile extends Controller
{
    public function index(...$param)
    {
        // echo $param[0];
        $users = new UserDAO();
        $user = $users->getUserInfo();
        $playlist = new PlaylistDAO();
        $playlists = $playlist->getLastsPlaylists();

        if(isset($_POST['submitAddPlaylist'])){
            $playlist = new PlaylistDAO();
            $playlist->getPlaylist()->getUser()->setId($_POST['userId']);
            $playlist->getPlaylist()->setName($_POST['playlistName']);

            $result = $playlist->addPlaylist($playlist->getPlaylist());
            if($result){
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        }

        $this->view('profile', ['user' => $user], $playlists);
    }


    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId =1;
            $newUserName = $_POST['newProfileName'];
            // $newUserImage = $_POST['newProfileImage'];

            $users = new UserDAO();
            $result = $users->updateProfile($userId, $newUserName);

            if ($result) {
                header('location:' . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Failed to update profile.";
            }
        } else {
            echo "Invalid request method.";
        }
    }
}

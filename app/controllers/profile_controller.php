<?php


class Profile extends Controller
{

    public function index(...$param)
    {


        $users = new UserDAO();
        $users->getUser()->setId($param[0]);
        $user = $users->getUserInfo($users->getUser());
        $playlist = new PlaylistDAO();
        $playlistMusic = new PlaylistMusicDAO();
        $playlists = $playlist->getLastsPlaylists($users->getUser());
        $playlistsProfile = $playlistMusic->getLastPlaylistsProfile($users->getUser());

        if (isset($_POST['submitAddPlaylist'])) {
            $playlist = new PlaylistDAO();
            $playlist->getPlaylist()->getUser()->setId($_SESSION['userId']);
            $playlist->getPlaylist()->setName($_POST['playlistName']);

            $result = $playlist->addPlaylist($playlist->getPlaylist());
            if ($result) {
                $playlistMusic->addPlaylistMusic($result);
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        }
        $data = ['user' => $user, 'playlists' => $playlists, 'playlistsProfile' => $playlistsProfile];
        $this->view('profile', $data);
    }


    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['userId'];
            $newUserName = $_POST['newProfileName'];

            if (!empty($newUserName)) {

                if (!empty($_FILES['newProfileImage']['name']) && isset($_FILES['newProfileImage']['tmp_name'])) {
                    $uploadedImage = $_FILES['newProfileImage'];
                    $newUserImage = uniqid() . '_' . $uploadedImage['name'];
                    $uploadDir = __DIR__ . '/../../assets/images/profile/';
                    $upload = $uploadDir . $newUserImage;

                    move_uploaded_file($uploadedImage['tmp_name'], $upload);
                } else {
                    $newUserImage = null;
                }

                $users = new UserDAO();

                if (!empty($newUserImage)) {
                    $result = $users->updateProfile($userId, $newUserName, $newUserImage);
                } else {
                    $result = $users->updateProfileName($userId, $newUserName);
                }

                if ($result) {
                    header('location:' . $_SERVER['HTTP_REFERER']);
                } else {
                    echo "Failed to update profile.";
                }
            } else {
                echo "Username cannot be empty.";
            }
        } else {
            echo "Invalid request method.";
        }
    }
}
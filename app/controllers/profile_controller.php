<?php


class Profile extends Controller
{



    public function index(...$param)
    {
        $users = new UserDAO();
        $user = $users->getUserInfo();
        $playlist = new PlaylistDAO();
        $playlists = $playlist->getLastsPlaylists();

        if (isset($_POST['submitAddPlaylist'])) {
            $playlist = new PlaylistDAO();
            $playlist->getPlaylist()->getUser()->setId($_POST['userId']);
            $playlist->getPlaylist()->setName($_POST['playlistName']);

            $result = $playlist->addPlaylist($playlist->getPlaylist());
            if ($result) {
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        }

        $this->view('profile', ['user' => $user], $playlists);
    }


    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = 1;
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
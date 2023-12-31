<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Home extends Controller
{
    public function index(...$param)
    {
        $playlist = new PlaylistDAO();
        $users = new UserDAO();
        $parolyPlaylists = new PlaylistMusicDAO();
        $album = new AlbumDAO();
        $music = new MusicDAO();

        $albums = $album->getLastAlbums();
        $musics = $music->getLastMusic();
        $featured = $parolyPlaylists->getFeaturedPlaylists();
        if (isset($_SESSION['userId'])) {
            $users->getUser()->setId($_SESSION['userId']);
            $user = $users->getUserInfo($users->getUser());
            $playlists = $playlist->getLastsPlaylists($users->getUser());
            $data = ['user' => $user, 'playlists' => $playlists, 'parolyplaylists' => $featured, 'musics' => $musics, 'albums' => $albums];
            $this->view('home', $data);
        } else {
            $data = ['parolyplaylists' => $featured, 'musics' => $musics, 'albums' => $albums];
            $this->view('home', $data);
        }
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $user = new UserDAO;
            $user->getUser()->setEmail(trim($_POST['email']));
            $user->getUser()->setPassword($_POST['password']);

            $user = $user->verifyUser($user->getUser());

            if ($user != false) {
                $_SESSION['userId'] = $user['userId'];
                $_SESSION['userName'] = $user['userName'];
                $_SESSION['userEmail'] = $user['userEmail'];
                $_SESSION['userImage'] = $user['userImage'];
                $_SESSION['userRole'] = $user['userRole'];


                if ($_SESSION['userRole'] == 'admin') {

                    header('location:/paroly/public/dashboard/index');
                } else {
                    header('location:/paroly/public/home/index');
                }
            } else {
                echo 'user not found';
            }
        }

        $this->view('login');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location:/paroly/public/home/login');
    }

    public function signup()
    {
        if (isset($_POST["registre"])) {
            $user = new UserDAO();

            // Validate name
            if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
                $name_error = 'Invalid name format';
            } else {
                $name_error = '';
            }

            // Validate email
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email_error = 'Invalid email address';
            } else {
                $email_error = '';
            }

            // Validate password
            if ($_POST['password'] == ' ') {
                $password_error = 'Invalid password format';
            } else {
                $password_error = '';
            }

            // Validate confirm password
            if ($_POST['password'] !== $_POST['confirm-password']) {
                $confirm_password_error = 'Passwords do not match';
            } else {
                $confirm_password_error = '';
            }

            // If all validations pass, proceed with user registration
            if ($email_error == '' && $name_error == '' && $password_error == '' && $confirm_password_error == '') {
                $user->getUser()->setName(trim($_POST['name']));
                $user->getUser()->setEmail(trim($_POST['email']));
                $user->getUser()->setPassword($_POST['password']);
                $user->getUser()->setRole(trim($_POST['role']));

                if ($user->signup($user->getUser()) == true) {
                    $rowUser = $user->selectLastUser();
                    $_SESSION['userId'] = $rowUser['userId'];
                    $_SESSION['userName'] = $rowUser['userName'];
                    $_SESSION['userEmail'] = $rowUser['userEmail'];
                    $_SESSION['userImage'] = $rowUser['userImage'];
                    $_SESSION['userRole'] = $rowUser['userRole'];
                    header('location:/paroly/public/home/login');
                } else {
                    $error_user = [
                        'email_error' => 'This email exist',
                        'name_error' => $name_error,
                        'password_error' => $password_error,
                        'confirm_password_error' => $confirm_password_error
                    ];
                    $this->view('signup', $error_user);
                }
            } else {
                $error_user = [
                    'email_error' => $email_error,
                    'name_error' => $name_error,
                    'password_error' => $password_error,
                    'confirm_password_error' => $confirm_password_error
                ];
                $this->view('signup', $error_user);
            }
        }
        $error_user = [
            'email_error' => '',
            'name_error' => '',
            'password_error' => '',
            'confirm_password_error' => ''
        ];
        $this->view('signup', $error_user);
    }

    private function alert($message)
    {
        echo '<script>alert("' . $message . '");</script>';
    }

    public function getArtists()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $artist = new ArtistDAO();
        $artist->getArtist()->setName($data['search']);
        $artists = $artist->searchArtist($artist->getArtist());
        $array = [];
        foreach ($artists as $artist) {
            $data = [
                'id' => $artist->getId(),
                'name' => $artist->getName(),
                'image' => $artist->getImage()
            ];
            $array[] = $data;
        }

        echo json_encode($array);
    }

    public function getMusic()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $music = new MusicDAO();
        $music->getMusic()->setName($data['search']);
        $musics = $music->searchMusic($music->getMusic());
        $array = [];
        foreach ($musics as $music) {
            $data = [
                'id' => $music->getId(),
                'name' => $music->getName(),
                'image' => $music->getImage(),
                'date' => $music->getDate(),
                'genre' => [
                    'name' => $music->getGenre()->getName(),
                ],
                'artist' => [
                    'name' => $music->getUser()->getName(),
                ]
            ];
            $array[] = $data;
        }

        echo json_encode($array);
    }
}

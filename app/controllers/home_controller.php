<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Home extends Controller
{
    public function index(...$param)
    {
        $users = new UserDAO();
        $users->getUser()->setId($_SESSION['userId']);
        $user = $users->getUserInfo($users->getUser());
        $playlist = new PlaylistDAO();
        
        $this->view('home', ['user' => $user]);
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
        if ($_SESSION['userRole'] == 'admin') {
            header('location:/paroly/public/dashboard/index');
        } else if ($_SESSION['userRole'] == 'client' || $_SESSION['userRole'] == 'artist') {

            header('location:/paroly/public/home/index');
        }
        $this->view('login');
    }

    public function logout()
    {
        $_SESSION['userId'] = null;
        $_SESSION['userName'] = null;
        $_SESSION['userEmail'] = null;
        $_SESSION['userImage'] = null;
        $_SESSION['userRole'] = null;

        header('location:/paroly/public/home/login');
    }

    // public function login()
    // {
    //     if (isset($_POST['login'])){
    //         $user = new UserDAO;
    //         $user->getUser()->setEmail(trim($_POST['email']));
    //         $user->getUser()->setPassword($_POST['password']);

    //         $user->verifyUser($user->getUser());

    //         // header('location:/paroly/public/home/client');
    //     }

    //     $this->view('login');
    // }

    public function signup()
    {
        if (isset($_POST["registre"])) {
            $user = new UserDAO();

            // Validate name
            if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
                $name_error = 'Invalid name format';
            } else{
                $name_error = '';
            }

            // Validate email
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email_error = 'Invalid email address';
            } else {
                $email_error = '';
            }

            // Validate password
            if ($_POST['password']==' ') {
                $password_error = 'Invalid password format';
            } else{
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
                        'name_error'=>$name_error,
                        'password_error'=>$password_error,
                        'confirm_password_error'=>$confirm_password_error
                    ];
                    $this->view('signup',$error_user);
                }
            } else {
                $error_user = [
                    'email_error' => $email_error,
                    'name_error'=>$name_error,
                    'password_error'=>$password_error,
                    'confirm_password_error'=>$confirm_password_error
                ];
                $this->view('signup',$error_user);
            }
            
        }
        if ($_SESSION['userRole'] == 'admin') {
            header('location:/paroly/public/dashboard/index');
        } else if ($_SESSION['userRole'] == 'client' || $_SESSION['userRole'] == 'artist') {

            header('location:/paroly/public/home/index');
        }
        
        $error_user = [
            'email_error' => '',
            'name_error'=>'',
            'password_error'=>'',
            'confirm_password_error'=>''
        ];
        $this->view('signup',$error_user);
    }
    private function alert($message)
    {
        echo '<script>alert("' . $message . '");</script>';
    }
} // public function signup()
// {



//     if (isset($_POST["registre"])) {
//         $user = new UserDAO();
//         if (preg_match('/^[a-zA-Z\s]+$/', $_POST['name']) && preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/u', $_POST['email']) && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/u', $_POST['password'])) {
//             // Name is valid


//             $user->getUser()->setName(trim($_POST['name']));
//             $user->getUser()->setEmail(trim($_POST['email']));
//             $user->getUser()->setPassword($_POST['password']);
//             $user->getUser()->setRole(trim($_POST['role']));

//             // $result = $user->verifyUser($user->getUser());
//             $user->signup($user->getUser());
//             header('location:/paroly/public/home/login');
//             // echo $_POST['name'];
//         }else{
//             echo'falsch';
//         }
//     }
//     $this->view('signup');
// }
// }

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



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

            if ($email_error == '' && $password_error == '') {
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
                }
                $error_user = [
                    'email_error' => 'user not found',
                    'password_error' => $password_error
                ];
                $this->view('login', $error_user);
            }else{
                $error_user = [
                    'email_error' => 'user not found',
                    'password_error' => $password_error
                ];
                $this->view('login', $error_user);
            }
        }else{
            $error_user = [
            'email_error' => '',
            'password_error' => ''
        ];
        $this->view('login',$error_user);
        }
        
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

    public function forgetpassword()
    {
        if (isset($_POST['resetpassword'])) {
            $user = new UserDAO;
            $user->getUser()->setEmail(trim($_POST['resetemail']));

            $_SESSION['resetemail'] = $_POST['resetemail'];

            $user = $user->verifyUserByEmail($user->getUser()->getEmail());

            if ($user == false) {
                $mail = new PHPMailer(true);

                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->SMTPAuth = true;

                $mail->Host = "smtp.gmail.com";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->Username = "youcodecodex@gmail.com";
                $mail->Password = "fagkcsrlveeijxap";

                    $mail->setFrom($mail->Username,'paroly');
                    $mail->addAddress($_POST['resetemail'],$_POST['resetemail']);
                    

                    $mail->Subject = 'subject';
                    $mail->Body = 'http://localhost/paroly/public/home/newpassword';
                    try {
                        $mail->send();
                        header('location:/paroly/public/home/ChekEmailForgetPassword');
                    } catch (Exception $e) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                
            } else {
                echo 'email not found';
            }
        }
        $this->view('forgetpassword');
    }

    public function newpassword(){
        if (isset($_POST["changepassword"])) {
            $user = new UserDAO();

            // Validate password
            if ($_POST['newPassword'] == ' ') {
                $password_error = 'Invalid password format';
            } else {
                $password_error = '';
            }

            // Validate confirm password
            if ($_POST['newPassword'] !== $_POST['newConfirmPassword']) {
                $confirm_password_error = 'Passwords do not match';
            } else {
                $confirm_password_error = '';
            }

            // If all validations pass, proceed with user registration
            if ($password_error == '' && $confirm_password_error == '') {
                $user->getUser()->setPassword($_POST['newPassword']);
                $user->getUser()->setEmail($_SESSION['resetemail']);
                if ($user->updatePassword($user->getUser()) == true) {
                    header('location:/paroly/public/home/login');
                } else {
                    $error_user = [
                        'password_error' => $password_error,
                        'confirm_password_error' => $confirm_password_error
                    ];
                    $this->view('signup', $error_user);
                }
            } else {
                $error_user = [
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
        $this->view('newpassword',$error_user);
    }
    private function alert($message)
    {
        echo '<script>alert("' . $message . '");</script>';
    }

    public function ChekEmailForgetPassword() {
        $this->view('chekEmailForgetPassword');
    }
}

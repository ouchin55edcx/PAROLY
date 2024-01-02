<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Home extends Controller
{
    public function index(...$param)
    {
        
        $this->view('home', $param);
    }

    public function login(){
        if(isset($_POST["registre"])){
            $user = new UserDAO();
            $user->getUser()->setName(trim($_POST['name']));

            $result = $user->verifyUser($user->getUser());
            

        }
        $this->view('login');
    }

    public function signup(){

        $this->view('signup');
    }

}

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

    public function test()
    {
    }
}

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Profile extends Controller
{
    public function index(...$param)
    {
        $users = new UserDAO();
        $user = $users->getUserInfo();
        $this->view('profile', ['user' => $user]);
    }
}

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

    public function test(){
    }
}

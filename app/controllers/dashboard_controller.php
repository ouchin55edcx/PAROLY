<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Dashboard extends Controller
{
    public function index(...$param)
    {        
        $this->view('dashboard', $param);
    }
}

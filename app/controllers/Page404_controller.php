<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Page404 extends Controller
{
    public function index(...$param)
    {
        $this->view('404', $param);
    }
}
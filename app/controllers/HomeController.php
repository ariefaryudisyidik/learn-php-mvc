<?php

class HomeController extends Controller
{
    public function index()
    {
        $this->view('templates/header', [
            'title' => 'Home',
        ]);
        $this->view('home/index', [
            'name' => $this->model('User')->getUser(),
        ]);
        $this->view('templates/footer');
    }
}

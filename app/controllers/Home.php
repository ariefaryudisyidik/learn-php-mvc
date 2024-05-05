<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('templates/header', [
            'title' => 'Home',
        ]);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}

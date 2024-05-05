<?php

class About extends Controller
{
    public function index($name = 'Arief', $job = 'Software Engineer', $age = 20)
    {
        $this->view('templates/header', [
            'title' => 'About',
        ]);
        $this->view('about/index', [
            'name' => $name,
            'job' => $job,
            'age' => $age,
        ]);
        $this->view('templates/footer');
    }

    public function page()
    {
        $this->view('templates/header', [
            'title' => 'Pages',
        ]);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}

<?php

class StudentController extends Controller
{
    public function index()
    {
        $this->view('templates/header', [
            'title' => 'Students',
        ]);
        $this->view('students/index', [
            'students' => $this->model('Student')->getAllStudents(),
        ]);
        $this->view('templates/footer');
    }
}

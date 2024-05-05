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

    public function detail($id)
    {
        $this->view('templates/header', [
            'title' => 'Student Detail',
        ]);
        $this->view('students/detail', [
            'student' => $this->model('Student')->getStudentById($id),
        ]);
        $this->view('templates/footer');
    }
}

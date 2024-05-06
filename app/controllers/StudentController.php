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

    public function store()
    {
        if ($this->model('Student')->insertStudent($_POST) > 0) {
            Flasher::setFlash('successfully', 'inserted', 'success');
            header('Location: '.BASE_URL.'/student');
            exit;
        } else {
            Flasher::setFlash('failed', 'inserted', 'danger');
            header('Location: '.BASE_URL.'/student');
            exit;
        }
    }
}

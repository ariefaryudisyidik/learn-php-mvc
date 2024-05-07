<?php

class StudentController extends Controller
{
    private const STUDENT_LOCATION = 'Location: '.BASE_URL.'/student';

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
            header(self::STUDENT_LOCATION);
            exit;
        } else {
            Flasher::setFlash('failed', 'inserted', 'danger');
            header(self::STUDENT_LOCATION);
            exit;
        }
    }

    public function destroy($id)
    {
        if ($this->model('Student')->deleteStudent($id) > 0) {
            Flasher::setFlash('successfully', 'deleted', 'success');
            header(self::STUDENT_LOCATION);
            exit;
        } else {
            Flasher::setFlash('failed', 'deleted', 'danger');
            header(self::STUDENT_LOCATION);
            exit;
        }
    }
}

<?php

class StudentController extends Controller
{
    private const STUDENT_LOCATION = 'Location: '.BASE_URL.'/student';

    public function index()
    {
        $this->view('templates/header', [
            'title' => 'Student',
        ]);
        $this->view('student/index', [
            'students' => $this->model('Student')->getAllStudents(),
        ]);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $this->view('templates/header', [
            'title' => 'Student Detail',
        ]);
        $this->view('student/detail', [
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

    public function getEdit()
    {
        echo json_encode($this->model('Student')->getStudentById($_POST['id']));
    }

    public function update()
    {
        if ($this->model('Student')->updateStudent($_POST) > 0) {
            Flasher::setFlash('successfully', 'updated', 'success');
            header(self::STUDENT_LOCATION);
            exit;
        } else {
            Flasher::setFlash('failed', 'updated', 'danger');
            header(self::STUDENT_LOCATION);
            exit;
        }
    }

    public function search()
    {
        $this->view('templates/header', [
            'title' => 'Student',
        ]);
        $this->view('student/index', [
            'students' => $this->model('Student')->searchStudent($_POST['keyword']),
        ]);
        $this->view('templates/footer');
    }
}

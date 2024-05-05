<?php

class Student
{
    private $table = 'student';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStudents(): array
    {
        $this->db->query("SELECT * FROM $this->table");

        return $this->db->resultSet();
    }

    public function getStudentById($id): array
    {
        $this->db->query("SELECT * FROM $this->table WHERE id=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }
}

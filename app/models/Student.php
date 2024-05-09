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

    public function insertStudent($data): int
    {
        $query = "INSERT INTO $this->table
        VALUES (0, :name, :npm, :major, :email)";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('major', $data['major']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteStudent($id): int
    {
        $query = "DELETE FROM $this->table WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateStudent($data): int
    {
        $query = "UPDATE $this->table SET
        name = :name,
        npm = :npm,
        major = :major,
        email = :email
        WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('major', $data['major']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

<?php

class Student
{
    private $dbh; // database handler

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;

        try {
            $this->dbh = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getAllStudents(): array
    {
        return $this->dbh
            ->query('SELECT * FROM student')
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}

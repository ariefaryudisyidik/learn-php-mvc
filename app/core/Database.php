<?php

class Database
{
    private $host = DB_HOST;

    private $username = DB_USERNAME;

    private $password = DB_PASSWORD;

    private $dbName = DB_NAME;

    private $dbh; // database handler

    private $stmt; // statement

    private $db; // database

    public function __construct()
    {
        // data source name
        $dsn = "mysql:host=$this->host;dbname=$this->dbName";

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function query($query): void
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null): void
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(): void
    {
        $this->stmt->execute();
    }

    public function resultSet(): array
    {
        $this->execute();

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single(): array
    {
        $this->execute();

        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(): int
    {
        return $this->stmt->rowCount();
    }
}

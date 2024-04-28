<?php

class Connection {
    private $servername;
    private $username_db;
    private $password_db;
    private $database_name;
    public $conn;

    public function __construct($servername, $username_db, $password_db, $database_name) {
        $this->servername = $servername;
        $this->username_db = $username_db;
        $this->password_db = $password_db;
        $this->database_name = $database_name;

        try {
            $dsn = "mysql:host={$this->servername};dbname={$this->database_name}";
            $this->conn = new PDO($dsn, $this->username_db, $this->password_db);
            // PDO to throw exceptions on errors
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}

?>

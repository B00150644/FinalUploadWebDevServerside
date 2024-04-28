<?php

require 'connection.php'; 

class User {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection->getConnection();
    }

    public function getUsers() {
        $sql = "SELECT UserName, SessionID, Password FROM user"; 
        $stmt = $this->conn->query($sql);

        $users = array();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = $row;
            }
        }

        return $users;
    }
}

?>

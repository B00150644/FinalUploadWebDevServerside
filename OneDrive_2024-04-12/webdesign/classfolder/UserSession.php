<?php
require 'connection.php'; 
// include 'config.php';

class UserSession  {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection->getConnection();
    }

    public function getSessionID(){
        $sessionID = null; // Variable to store the session ID

        // Check if $_SESSION['Username'] is set
        if (isset($_SESSION['Username'])) {
            $sessionIDSql = "SELECT c.AccountNo
                            FROM customer c
                            INNER JOIN user u ON c.AccountNo = u.SessionID
                            WHERE u.UserName = ?";

            // Prepare the SQL statement
            $stmt = $this->conn->prepare($sessionIDSql);
            $stmt->bindParam(1, $_SESSION['Username'], PDO::PARAM_STR);

            // Execute the query
            if ($stmt->execute()) {
                // Fetch the session ID
                $sessionID = $stmt->fetchColumn();
            }
        } else {
            // $_SESSION['Username'] not set
        }

        // Return the session ID
        return $sessionID;
    }
}


?>
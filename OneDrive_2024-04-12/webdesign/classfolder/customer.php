<?php
require 'connection.php'; 
include 'config.php';

class Customer extends User {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection->getConnection();
    }

    public function customerInfo(){
        $customerData = array(); // Array to store customer information

        // Check if $_SESSION['Username'] is set
        if (isset($_SESSION['Username'])) {
            $customerSql = "SELECT c.AccountNo, c.Name, c.PhoneNo, c.Email, u.UserName
                            FROM customer c
                            INNER JOIN user u ON c.SessionID_fk2 = u.SessionID
                            WHERE u.UserName = ?";

            // Prepare the SQL statement
            $stmt = $this->conn->prepare($customerSql);
            $stmt->bindParam(1, $_SESSION['Username'], PDO::PARAM_STR);

            // Execute the query
            if ($stmt->execute()) {
                // Fetch all rows
                $customerData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // Handle query execution error
                $customerData = array();
            }
        } else {
            // $_SESSION['Username'] not set
        }

        // Return the customer data
        return $customerData;
    }
}
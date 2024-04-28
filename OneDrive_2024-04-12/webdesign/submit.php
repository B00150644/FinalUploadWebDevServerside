<?php
require 'connection.php'; 


try {
    // Find the maximum AccountNo currently in use
    $sqlhighestaccountno = "SELECT MAX(AccountNo) AS max_account FROM customer";
    $maxaccountstatement = $conn->query($sqlhighestaccountno);
    $maxaccountrow = $maxaccountstatement->fetch(PDO::FETCH_ASSOC);
    $nextaccountno = ($maxaccountrow["max_account"] !== null) ? $maxaccountrow["max_account"] + 1 : 1;

    // Find the maximum SessionID currently in use
    $sqlMaxSession = "SELECT MAX(SessionID) AS max_session FROM user";
    $MaxSessionStatement = $conn->query($sqlMaxSession);
    $MaxSessionRow = $MaxSessionStatement->fetch(PDO::FETCH_ASSOC);
    $nextsessionid = ($MaxSessionRow["max_session"] !== null) ? $MaxSessionRow["max_session"] + 1 : 1;

    // Form submission handling
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate form data 
        $name = $_POST["name"];
        $number = $_POST["number"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["username"];

        // Insert data into database for user table
        $usersql = "INSERT INTO user (username, password, SessionID) VALUES (?, ?, ?)";
        $Statementuser = $conn->prepare($usersql);
        $Statementuser->execute([$username, $password, $nextsessionid]);

        // Insert data into database for customer table
        $customersql = "INSERT INTO customer (AccountNo, Name, Email, PhoneNo, SessionID_fk2) VALUES (?, ?, ?, ?, ?)";
        $Statementcustomer = $conn->prepare($customersql);
        $Statementcustomer->execute([$nextaccountno, $name, $email, $number, $nextsessionid]);

        //succes message
        echo '<div class="success-message">New user record created successfully</div>';

        
        echo '<div class="success-message">New record created successfully</div>';
        // Increment the next AccountNo for the next insertion
        $nextaccountno++;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null; // Close connection
?>

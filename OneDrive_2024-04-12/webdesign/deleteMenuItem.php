<?php

require 'connection.php'; 

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $MenuID = $_POST["MenuID"]; 
    
    // Prepare SQL statement to delete row with provided MenuID
    $sql = "DELETE FROM menu WHERE MenuID = ?";
    
    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(1, $MenuID, PDO::PARAM_INT);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Row deleted successfully.";
        } else {
            echo "Error executing statement.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close statement
    unset($stmt);
}

// Redirect the user to menu.php
$redirect_url = isset($_POST['redirect']) ? $_POST['redirect'] : 'admin.php';
header("Location: $redirect_url");
exit;
?>

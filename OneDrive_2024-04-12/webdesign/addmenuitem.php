<?php
require 'connection.php'; 

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $MenuID = $_POST["MenuID"]; // Manually input MenuID
    $ProductName = $_POST["ProductName"];
    $adminID_fk = $_POST["adminID_fk"]; // Manually input adminID_fk
    
    try {
        // Prepare SQL statement to insert data with manually input MenuID
        $sql = "INSERT INTO menu (MenuID, ProductName, adminID_fk) VALUES (?, ?, ?)";
        
        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->execute([$MenuID, $ProductName, $adminID_fk]);

        echo "New record added successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close statement and connection
    $stmt = null;
    $conn = null;
}

// Redirect the user to menu.php
$redirect_url = isset($_POST['redirect']) ? $_POST['redirect'] : 'admin.php';
header("Location: $redirect_url");
exit;
?>

<?php
require 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateMenuItem"])) {
    // Get form data
    $MenuID = $_POST["MenuID"];
    $ProductName = $_POST["ProductName"];
    $adminID_fk = $_POST["adminID_fk"];
    
    try {
        // Prepare SQL statement to update data with manually input MenuID
        $sql = "UPDATE menu SET ProductName = :ProductName, adminID_fk = :adminID_fk WHERE MenuID = :MenuID";
        
        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'ProductName' => $ProductName,
            'adminID_fk' => $adminID_fk,
            'MenuID' => $MenuID
        ]);

        echo "Record updated successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Close connection
        $conn = null;
    }
}
?>

<?php

require_once('classfolder/Connections.php');

// Database connection information
$servername = "localhost"; 
$username_db = "root";
$password_db = "";
$database_name = "italian_restaurant";

// Create a new instance of the Connection class
$connection = new Connection($servername, $username_db, $password_db, $database_name);

// Get the PDO connection object
$conn = $connection->getConnection();

?>
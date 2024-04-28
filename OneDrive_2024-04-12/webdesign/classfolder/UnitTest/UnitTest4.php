<?php


?>
<?php
require '../../connection.php'; 
require '../usermethod.php';
echo "Unit Test User:" . "<br>" . "<br>";
echo "This is to validate the User information and displays each row from the database:" . "<br>" . "<br>";
$userHandler = new UserAccountManager($connection); // UserAccountManager class with database connection

$users = $userHandler->getUsers(); // Call the getUsers function to retrieve users

foreach ($users as $user) { // Display user information
    echo "Username: " . $user->getUserName() . ", SessionID: " . $user->getSessionId() . ", Password: " . $user->getPassword() . "<br>";
}

$connection->closeConnection();
?>


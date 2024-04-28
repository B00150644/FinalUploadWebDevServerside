<?php
session_start();
require_once('classfolder/config.php');
require_once('classfolder/adminclass.php');
require 'classfolder/UserSession.php';
// Instantiate the User class
$userObj = new User($connection); 


        
// Create an instance of the UserSession class
 $usersession = new Usersession($connection);

 // Get the SessionID_fk2 value
 $accountNoRes = $usersession->getsessionID();

 
 //minus one off the accountno to link session id and customer account no as admin doesnt have a customer account so its user 1 but not user 1 in customer
 $accountNoRes--;
 // Store the SessionID_fk2 in a session variable
 $_SESSION['sessionNum'] = $accountNoRes;
// Instantiate the Admin class
$adminObj = new Admin($connection); 


// Get users from the database
$users = $userObj->getUsers();

/* Check if login form has been submitted */
if (isset($_POST['Submit'])) {
    $loginSuccessful = false;

    /* repeat over the array of users fetched from the database and check if any match the entered username and password */
    foreach ($users as $user) {
        if (($user['UserName'] == $_POST['Username']) && ($user['Password'] == $_POST['Password'])) {
            $loginSuccessful = true;
            $_SESSION['Username'] = $_POST['Username'];
            $_SESSION['Active'] = true;
            
            // Check if the entered username is 'Admin' and redirect 
            if ($_POST['Username'] == 'Admin') {
                header("location: admin.php"); // Redirect to admin.php if the entered username is 'Admin'
            } else {
                // Redirect to menu.php for customers
                header("location: menu.php"); 
            }
            exit;
        }
    }

    /* If no user was found with matching credentials */
    if (!$loginSuccessful) {
        echo 'Incorrect Username or Password';
    }
}
?>

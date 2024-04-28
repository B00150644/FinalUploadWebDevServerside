<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      
    <title>Italian Restaurant</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/confirmation.css">
</head>
<?php 
require 'Templates/Header.php'; 
?>
<?php

require 'connection.php';
require 'classfolder/AccountReservationClass.php'; 
require 'classfolder/customer.php'; 
require 'classfolder/reservationdelet.php';
// Instantiate the Customer class
$customer = new Customer($connection); 

// Call the customerInfo method to fetch customer data
$customerData = $customer->customerInfo();

// Output the customer data
if (!empty($customerData)) {
    foreach ($customerData as $customerInfo) {
        ?>
        <div class="confirm">
            <h1>
            <?php
                echo "Customer Information:<br>";
            ?>
            </h1>
            <?php
            // Print customer information
                echo "Customer Number: " . $customerInfo['AccountNo'] . "<br>";
                echo "Name: " . $customerInfo['Name'] . "<br>";
                echo "Phone Number: " . $customerInfo['PhoneNo'] . "<br>";
                echo "Email: " . $customerInfo['Email'] . "<br>";
                echo "Username: " . $customerInfo['UserName'] . "<br>";
                echo "<br>";
            ?>
        </div>
<?php
    }
} else {
    echo "No customer data found.";
}

// Instantiate the AccountReservation class
$reservation = new AccountReservation($connection); 

// Call the getAccountReservations method to fetch reservation data
$reservationData = $reservation->getAccountReservations();

// Output the reservation data
if (!empty($reservationData)) {
    ?>
    <body>
        <h1>
        <?php
            echo "Reservation Information:<br>";
            foreach ($reservationData as $reservationInfo) {
        ?>
        </h1>
    <div class="reservation">
        <?php
            // Print reservation information
            echo "Reservation ID: " . $reservationInfo['ReservationID'] . "<br>";
            echo "Date: " . $reservationInfo['Date'] . "<br>";
            echo "Time: " . $reservationInfo['Time'] . "<br>";
            echo "Guest No: " . $reservationInfo['GuestNo'] . "<br>";
            echo "Attendence: " . $reservationInfo['Attendence'] . "<br>";
            echo "Cancelled: " . $reservationInfo['Cancelled'] . "<br>";
            echo "Account Number: " . $reservationInfo['AccountNo_fk'] . "<br>";
            echo "Table ID: " . $reservationInfo['TableID_FK'] . "<br>";
             // Add a delete button for each reservation
             echo "<form action='Account.php' method='post'>";
             echo "<input type='hidden' name='Reservationid' value='" . $reservationInfo['ReservationID'] . "'>";
             echo "<input type='submit' value='Cancel Reservation'>";
             echo "</form>";
             echo "<br>";

        ?>
    </div>
    </body>
       <!-- <hr> -->
    <?php
    }
} 
    else {
        echo "No reservation data found.";
    }

    require 'Templates/Accountlogout.php'; 
    ?>
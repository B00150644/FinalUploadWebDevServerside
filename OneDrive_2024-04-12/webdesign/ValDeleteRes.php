<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if($_SESSION['Active'] == false){ /* Redirects user to Login.php if
not logged in. Remember, we set $_SESSION['Active'] == true in
login.php*/
 header("location:login.php");
 exit;
}
/*the code inside these php tags (i.e. the 5 lines of code above) are
required for every page you wish to be accessible only after login*/
?>

     <div class="bag">
     
     </div>
     
     <script>
        $(function(){
         $(".toggle").on("click",function(){
           if($(".menu").hasClass("active")){
               $(".menu").removeClass("active");
               $(this).find("a").html("<ion-icon name='menu-outline'></ion-icon>");
           } else{
               $(".menu").addClass("active");
               $(this).find("a").html("<ion-icon name='close-outline'></ion-icon>");
           }
         });
        });
     
     
     </script>
     
<?php

require 'connection.php';
require 'classfolder/AccountReservationClass.php'; 
require 'classfolder/customer.php'; 
require 'classfolder/reservationdelet.php';
// Instantiate the Customer class
$customer = new Customer($connection); 

// Call the customerInfo method to fetch customer data
$customerData = $customer->customerInfo();

// Output or use the customer data
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

// Output or use the reservation data
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
             echo "<form action='ValDeleteRes.php' method='post'>";
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

    // require 'Templates/Accountlogout.php'; 
    ?>
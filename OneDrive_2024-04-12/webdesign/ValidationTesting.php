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
echo "VALIDATION Test of Cancel Reservation USE case :" . "<br>" . "<br>";
echo "System displays users reservations and gives the option to cancel :" . "<br>" . "<br>";

require 'connection.php';
require 'classfolder/AccountReservationClass.php'; 
require 'classfolder/customer.php'; 
require 'classfolder/reservationdelet.php';
// Instantiate the Customer class
$customer = new Customer($connection); 

// Call the customerInfo method to fetch customer data
$customerData = $customer->customerInfo();

// Output  the customer data
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
<?php
echo "VALIDATION Test of Assign Table Use case :" . "<br>" . "<br>";
echo "System checks if table available for user:" . "<br>" . "<br>";
require 'classfolder/Reservations.php';

// require 'loginmethod.php';

// Database connection parameters
$servername = "localhost"; 
$username_db = "root";
$password_db = "";
$database_name = "italian_restaurant";

// Create a new instance of the Connection class
$connection = new Connection($servername, $username_db, $password_db, $database_name);

// Get the PDO connection object
$conn = $connection->getConnection();

        
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Create a new instance of the Reservations class
        $reservations = new Reservations($connection);

        // Handle form submission
        $reservations->handleFormSubmission();
    } catch (Exception $e) {
        // Display error message
        echo "Error: " . $e->getMessage();
    }

    // Echo all the form inputs
    echo "Form Inputs:<br>";
    foreach ($_POST as $key => $value) {
        echo ucfirst($key) . ": " . $value . "<br>";
    }
}

try {
    // Prepare and execute the query using the existing connection
    $stmt = $conn->prepare("SELECT * FROM tables");
    $stmt->execute();

    // Fetch all rows as an associative array
    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the result
    echo "<p>Table Availability </p>";
    echo "<table border='1'>";
    echo "<tr><th>Table ID</th><th>Size</th><th>Availability</th></tr>";
    foreach ($tables as $table) {
        echo "<tr>";
        echo "<td>" . $table['TableID'] . "</td>";
        echo "<td>" . $table['Size'] . "</td>";
        echo "<td>" . $table['Availability'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch(PDOException $e) {
    // Handle any errors that occur during the process
    echo "Error: " . $e->getMessage();
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="registration" method="POST">
    <div class="container">
       <?PHP
    //    var_dump($_SESSION);
       ?>
         <h2>Reservation </h2>

        <label for="Date">Date</label>
        <input type="date" name="date" id="date" placeholder="02/01/2003" />
        <br>

        <label for="Time">Time</label>
        <input type="time" name="time" id="time" placeholder="12:30" />
        <br>

        <label for="TableNo">Number of People</label>
        <input type="number" name="number" id="number" placeholder="1-50" />
        <br>

        <label for="dinner">Choose a set Menu:</label>
        <br>
        <label for="3course">3 Course Meal €40</label>
        <input type="number" name="3course" id="3course" placeholder="1-20" onchange="calculateTotal()" />
        <br>

        <label for="2course">2 Course Meal €25</label>
        <input type="number" name="2course" id="2course" placeholder="1-20" onchange="calculateTotal()" />
        <br>

        <label for="kids">Kids Meal €15</label>
        <input type="number" name="kids" id="kids" placeholder="1-20" onchange="calculateTotal()" />
        <br>

        <h3>Payment</h3>
        <label for="fname">Accepted Cards</label>

        <div class="icon-container">
            <img src="images/mastercard.jpg" alt="mastercard" width="5%" height="12px">
            <img src="images/visa.jpg" alt="visa" width="5%" height="12px">
            <img src="images/verifiedcard.png" alt="visa" width="5%" height="12px">
            <img src="images/aib.png" alt="visa" width="5%" height="12px">
        </div>

        <label for="ctype">Card Type</label>
        <input type="text" id="ctype" name="cardType" placeholder="mastercard">

        <label for="ccnum">Card Number</label>
        <input type="text" id="ccnum" name="cardNo" placeholder="1111-2222-3333-4444">

        <label for="cname">Card Name</label>
        <input type="text" id="cname" name="cardName" placeholder="John More Doe">

        <h3>Total</h3>
        <input type="text" id="total" name="total" readonly>


        <div class="button">
            <button type="submit" name="submit" id="submit" value="Register" href="Submit.html">Finalise Reservation</button>
        </div>


        <div class="signup">
            <h8>Login/Signup to confirm reservation? <a href="login.html">Login</a></h8>
        </div>


</form>

<br>
</div>
</div>

<br>
<script>
    function calculateTotal() {
        var total = 0;
        var threeCourseQty = parseInt(document.getElementById('3course').value) || 0;
        var twoCourseQty = parseInt(document.getElementById('2course').value) || 0;
        var kidsQty = parseInt(document.getElementById('kids').value) || 0;

        total = (threeCourseQty * 40) + (twoCourseQty * 25) + (kidsQty * 15);

        document.getElementById('total').value = "€" + total.toFixed(2);
    }
</script>
</body>



<?php 
echo "VALIDATION Test of Create Account Use Case  :" . "<br>" . "<br>";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
</head>

<body>

<?php

// require 'loginmethod.php';
require 'submit.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
      

        // Echo all the form inputs 
        echo "<h2>Registration Details</h2>";
        echo "Below Shows the Form Inputs the user enters:<br>";
        foreach ($_POST as $key => $value) {
            echo ucfirst($key) . ": " . $value . "<br>";
        }
        echo "</div>";
    } catch (Exception $e) {
        // Display error message
        echo "Error: " . $e->getMessage();
    }
}
?>

<div class="container">
    <h2>Login / Register</h2>
    <form action="VALSIGN.php" id="registration" method="POST">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" />
        <br>

        <label for="number">Mobile Number</label>
        <input type="tel" name="number" id="number" placeholder="123-4567899" />
        <br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="john@doe.com" />
        <br>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" />
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
        <br>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" />
        <br>

        <label for="checkbox">Read Terms and Conditions</label>
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox" />

        <div class="button">
            <button type="submit" name="submit" id="submit" value="Register">Register</button>
        </div>

    </form>
    <a href="checkout.html"><ion-icon name="arrow-back-outline"></ion-icon></a>
</div>

</body>
<?php

echo "Validation Test For Creating a User by Signing UP:" . "<br>" . "<br>";
echo "This is to validate the User information and displays each row from the database:" . "<br>" . "<br>";

try {
    // Prepare SQL statement to select user information
    $sql = "SELECT UserName, SessionID, Password FROM user"; 
    $stmt = $connection->getConnection()->query($sql); // Access the PDO object from the Connection class

    // Check if there are rows returned
    //https://www.drpankajdadhich.com/2022/06/displaying-table-data-from-php.html Used to help with table
    if ($stmt->rowCount() > 0) {
        // Output table header
        echo "<table border='1'>
                <tr>
                    <th>Username</th>
                    <th>SessionID</th>
                    <th>Password</th>
                </tr>";

        // Output data rows
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['UserName'] . "</td>";
            echo "<td>" . $row['SessionID'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "</tr>";
        }

        // Close table
        echo "</table>";
    } else {
        echo "No users found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); // Output any errors
}

// Close the database connection
$connection = null;
?>

<?php 
echo "VALIDATION Test of Browse Menu Use Case  :" . "<br>" . "<br>";
echo "Shows how menu is updated deleted and added to and Reads the menu :" . "<br>" . "<br>";
?>
<!DOCTYPE html>
<html lang="en">


</div>

</head>
<body>


<?php
require 'adminmenumethod.php';

?>

<form action="addmenuitem.php" method="post">
    <label for="MenuID">Menu ID:</label>
    <input type="text" id="MenuID" name="MenuID" required><br><br>
    
    <label for="ProductName">Product Name:</label>
    <input type="text" id="ProductName" name="ProductName" required><br><br>
    
    <label for="adminID_fk">Admin ID:</label>
    <input type="text" id="adminID_fk" name="adminID_fk" required><br><br>
    
    <input type="submit" value="Add Menu Item">
</form>

<form action="deleteMenuItem.php" method="post">
    <label for="MenuID">Menu ID:</label>
    <input type="text" id="MenuID" name="MenuID" required><br><br>
    
    <input type="submit" value="Delete Menu Item">
</form>

</div>

  

</html>

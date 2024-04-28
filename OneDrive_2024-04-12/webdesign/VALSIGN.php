<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
</head>

<body>

<?php
require 'connection.php';
require 'loginmethod.php';
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


</html>

<?php
require 'classfolder/Reservations.php';
require 'connection.php';
require 'loginmethod.php';

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
</html>
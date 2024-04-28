<?php
require 'classfolder/Reservations.php';
require 'connection.php';
require 'loginmethod.php';
        
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                // Create a new instance of the Reservations class
                $reservations = new Reservations(new Connection($servername, $username_db, $password_db, $database_name));

                // Handle form submission
                $reservations->handleFormSubmission();
            } catch (Exception $e) {
                // Display error message
                echo "Error: " . $e->getMessage();
            }

            //  // Echo all the form inputs
            //  echo "Form Inputs:<br>";
            //  foreach ($_POST as $key => $value) {
            //      echo ucfirst($key) . ": " . $value . "<br>";
            //  }
        }
        ?>

<?php require 'Templates/HeaderReservation.php'; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="registration" method="POST">
    <div class="container">
       <?PHP
    //    var_dump($_SESSION);
       ?>
         <h2>Reservation </h2>

         <label for="Date">Date</label>
        <input type="date" name="date" id="date" placeholder="02/01/2003" default />
        <br>

        <label for="Time">Time</label>
        <input type="time" name="time" id="time" placeholder="12:30" />
        <br>

        <label for="TableNo">Number of People</label>
        <input type="number" name="number" id="number" placeholder="1-16"  min="1" />
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
            <!-- <img src="images/verifiedcard.png" alt="visa" width="5%" height="12px">
            <img src="images/aib.png" alt="visa" width="5%" height="12px"> -->
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
  // Get today's date
  var today = new Date().toISOString().split('T')[0];

  // Set the input field value to today's date
  document.getElementById('date').value = today;

  // Get the current time
  var now = new Date();

  // Format hours and minutes with leading zeros
  var hours = now.getHours().toString().padStart(2, '0');
  var minutes = now.getMinutes().toString().padStart(2, '0');

  // Set the input field value to the current time
  document.getElementById('time').value = hours + ':' + minutes;
</script>
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
<?php require 'templates/footer.php'; ?>
</html>
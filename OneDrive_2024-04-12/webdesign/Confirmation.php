<?php
require 'Templates/Header.php';
?>
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

<body>
    <div class="confirm">
        <h1> Your Booking is Confirmed! </h1>

        <p>To view your Booking, please go to the <a href="Account.php">Account</a> page!</p>
    <br>
    <br>
    <button onclick="document.location='Account.php'">View Booking!</button>
    <br>
    <br>
    <button onclick="document.location='menu.php'">View Menu!</button>
    <br>
    </div>
</body>

</html>
<?php require 'Templates/footerhome.php'; ?>
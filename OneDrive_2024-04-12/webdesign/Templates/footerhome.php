<footer>

<div class="flex-container">
      <div> <h5>ITALIA ITALIAN RESTAURANT</h5>
        <p>21 Pachino Street<br>Dublin 4<br>Ireland<br>D04 K000<p>
      </div>

      <div> <img src="images/logo.jpg" alt="logo" width="69%" height="100px"> </div>

      <div><h5>Follow Us: </h5>
    <a href="https://www.instagram.com/" ><ion-icon name="logo-instagram"></ion-icon></a>
    <a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a>
    <a href="https://twitter.com/?lang=en"><ion-icon name="logo-twitter"></ion-icon></a>
    
        <div class="logout-box">
    <div class="mainarea">
    <?php 
// Check if the session variable is set
if (isset($_SESSION['Username'])) {
    // If the user is logged in, display the logout button
    ?>
    <div class="logout-box">
        <div class="mainarea">
            <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
                <button name="Submit" value="Logout" class="logout-button" type="submit">Log out</button>
            </form>
        </div>
    </div>
<?php 
}
?>

    </div>
</div>
    </div>

</footer>
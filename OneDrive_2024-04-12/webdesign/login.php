<?php include 'Templates/Headernolog.php'; 

?>
    <body>
    <div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>

    <script>
        $(function() {
            $(".toggle").on("click", function() {
                if ($(".menu").hasClass("active")) {
                    $(".menu").removeClass("active");
                    $(this).find("a").html("<ion-icon name='menu-outline'></ion-icon>");
                } else {
                    $(".menu").addClass("active");
                    $(this).find("a").html("<ion-icon name='close-outline'></ion-icon>");
                }
            });

         
        });
    </script>


    <footer>
        <div class="footer">
            <h5>Follow Us: </h5>
            <a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="https://twitter.com/?lang=en"><ion-icon name="logo-twitter"></ion-icon></a>
        </div>
    </footer>

</body>

</html>

<?php
require('loginmethod.php');
?>
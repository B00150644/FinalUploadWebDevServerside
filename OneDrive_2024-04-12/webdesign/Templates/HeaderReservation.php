<?php
// session_start();
if($_SESSION['Active'] == false){ /* Redirects user to Login.php if
not logged in. Remember, we set $_SESSION['Active'] == true in
login.php*/
 header("location:login.php");
 exit;
}
/*the code inside these php tags (i.e. the 5 lines of code above) are
required for every page you wish to be accessible only after login*/
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
  </head>
 <body>
    
 <nav> 
      <div class="logo">
         <img src="images/logo.jpg" alt="logo" width="140%" height="70px">  
      </div>
       
      <div class="toggle">
          <a href="#"><ion-icon name="menu-outline"></ion-icon></a>
          </div>
          
          
          <ul class="menu">
          <li><a href="home.php">HOME</a></li>
    <li><a href="menu.php">MENU</a></li>
    <li><a href="reservation.php">RESERVATION</a></li>
    
    <?php
   
    if(isset($_SESSION['Username']) && $_SESSION['Username'] === 'Admin') {
        echo '<li><a href="Admin.php">ADMIN</a></li>'; // Display Admin for Admin users
    } else {
        echo '<li><a href="Account.php">ACCOUNT</a></li>'; // Display Account for non-Admin users
    }
    ?>
   
          <div class="topnav-right">
           <li><a href="login.php">LOGIN</a></li>       
         </div>
         </div>
    
        
  </body>


</div>
       </ul>

       </nav>
     
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
     
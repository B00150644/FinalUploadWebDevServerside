
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
    <link rel="stylesheet" href="css/home.css">
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
          <li><a href="signup.php">SIGNUP</a></li>
          <li><a href="Account.php">ACCOUNT</a></li>
          <div class="topnav-right">
           <li><a href="login.php">LOGIN</a></li>       
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
     
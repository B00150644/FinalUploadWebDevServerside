<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'Templates/Headernolog.php'; 
?>
<?php require 'submit.php'; 
?>
<!------gridcontainer------------>
     
<div class="grid-container">

   
 <!---<div class="item1">
  <img src="images/intro.jpg" alt="cover" width="100%" height="400px">
</div>--->

<div class="item1">
    <div class="image-container">
      <img src="images/intro.jpg" alt="cover" width="100%" height="400px">
      <button class="hover-button" onclick="window.location.href = 'menu.php';">VIEW MENU</button>
    </div>
  </div>

    
    
  <div class="item2" alt="item2" >
      <br>

      <h1>Come Visit Us</h1>
     <p>WE ARE OPEN <br>DAYS___________________________TIME 
    <br>MONDAY................................................................CLOSED
    <br>TUESDAY - FRIDAY........................................10AM-11PM
    <br>SATURDAY - SUNDAY........................................10AM-1AM

      
        
     <div class="button">
     <button onclick="window.location.href = 'reservation.php';">MAKE RESERVATION</button>
    </div>

      <br>
 </div>
    
    

 <div class="item3">
    <div class="image-container">
      <img src="images/intro3.jpg" alt="item3" width="100%" height="370px">
      <button class="hover-button" onclick="window.location.href = 'menu.php';">View Menu</button>
    </div>
  </div>


  <div class="item5"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9527.27628729639!2d-6.283443092830275!3d53.346494886590676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e82c3f8ab0f%3A0x4872fa4dfb1cd3b4!2sBar%20Italia%20Ristorante!5e0!3m2!1sen!2sie!4v1713883801187!5m2!1sen!2sie" width="300" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br></div>
   
  <div class="item6"> 
      <br>
     <h1>About Us</h1>
     <p>From the rolling hills of Tuscany to the bustling streets of Naples, our menu pays homage to the diverse regions of Italy,<br>
       showcasing traditional recipes passed down through generations. Whether you're indulging in our handmade pasta,<br>
       savoring our wood-fired pizzas, or exploring our curated selection of wines, each dish is crafted <br> with passion and precision.
       Join us at "Italia" for an unforgettable dining experience.
       <div class="button">
       <button onclick="window.location.href = 'reservation.php';">MAKE RESERVATION</button>  
      </div>

             
    </div>
    
    <div class="item8"> 
    <div class="image-container">
      <img src="images/intro4.jpg" alt="item3" width="100%" height="370px">
      <button class="hover-button" onclick="window.location.href = 'menu.php';">View Menu</button>
    </div>
  </div>

    <div class="item7"> 
      <br>
      <h1>The Italia Restaurant</h1>
      <p>Welcome to "Italia" where every meal is a love letter to the rich culinary tapestry of Italy.<br>
      Nestled in the heart of Dublin, our restaurant invites you to experience <br>
      the vibrant flavors and warm hospitality of the Italian table.<br>
           
      <div class="button2">
        <button onclick="window.location.href = 'reservation.php';">MAKE RESERVATION</button>
      </div>
    </div>

</div>

  </body>
  
  <style>
  
  .item1 .image-container, .item3 .image-container, .item8 .image-container {
    position: relative;
    width: 100%;
    height: 400px;
    overflow: hidden;
  }

  .item1 img, .item3 img, .item8 img {
    width: 100%;
    height: 100%;
    opacity: 2;
    transition: transform 0.3s ease;
  }

  .item1 .hover-button, .item3 .hover-button, .item8 .hover-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px 20px;
    background-color: #333;
    font-family: roxborough, garamond,  serif;
    color: white;
    border: none;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

  .item1:hover .hover-button, .item3:hover .hover-button, .item8:hover .hover-button {
    opacity: 1;
  }

  .item1:hover img, .item3:hover img, .item8:hover img {
    opacity: 0.7; /* Reduced opacity when hovering */
  }
  /* Add styles for other grid items as needed */

</style>



  <?php require 'Templates/footerhome.php'; 
    ?>
 
          


</html>
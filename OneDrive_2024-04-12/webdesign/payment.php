<?php require 'classfolder/Reservations.php'?>
<?php require 'Templates/Header.php'; 



?>

<div class="container">
     
     <form action="payment.php" id="registration">

       <div class="col-50">
           <h3>Payment</h3>
           <label for="fname">Accepted Cards</label>

           <div class="icon-container">
             <img src="images/mastercard.jpg" alt="mastercard" width="5%" height="12px"> 
             <img src="images/visa.jpg" alt="visa" width="5%" height="12px"> 
             <img src="images/verifiedcard.png" alt="visa" width="5%" height="12px">  
             <img src="images/aib.png" alt="visa" width="5%" height="12px">  
           </div>

           <label for="ctype">Card Type</label>
           <input type="text" id="ctype" name="cardtype" placeholder="mastercard">

           <label for="ccnum">Card Number</label>
           <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">

           <label for="cname">Card Name</label>
           <input type="text" id="cname" name="cardname" placeholder="John More Doe">

           <label for="cname">Total: €<?php echo $price;?></label> 
           
           
         
           
           <div class="button">
             <button type="checkout" name="checkout" id="checkout" value="checkout">Submit<!--<a href="Submit.html"> Register</a>--> </button>
          </div>

       </div>
       <?php require 'Templates/footer.php'; 
    ?>

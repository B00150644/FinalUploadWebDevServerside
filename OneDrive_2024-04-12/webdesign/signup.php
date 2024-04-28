<!DOCTYPE html>

<?php include 'Templates/Headernolog.php'; 
?>     

<div class="container">
    <h2>Register </h2>
    <form action="home.php" id="registration" method="POST">
  
        <label for="name">Name</label>
        <input type="text" name="name" id="name"/>
        <br>
        
        <label for="number">Mobile Number</label>
        <input type="tel" name="number" id="number" placeholder="123-4567899"/>
        <br>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="john@doe.com"/>
        <br>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" />
        <br>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/>
        <br>
        
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password"/>
        <br>
        
        <label for="checkbox">Read Terms and Conditions</label>
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox"/>
        
        <div class="button">
            <button type="submit" name="submit" id="submit" value="Register" href="login.php" >Register<!--<a href="Submit.html"> Register</a>--> </button>
        </div>
      
    </form>
    
</div>
        

   
  

</div>
    
        
  </body>
<br>
<br>
<br>
<br>
<br>


  <?php require 'Templates/footerhome.php'; 
    ?>
 
    
          
  </footer>

</html>

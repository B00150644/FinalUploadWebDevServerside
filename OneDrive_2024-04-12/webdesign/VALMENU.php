<!DOCTYPE html>
<html lang="en">


</div>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>


<?php
require 'adminmenumethod.php';

?>

<form action="addmenuitem.php" method="post">
    <label for="MenuID">Menu ID:</label>
    <input type="text" id="MenuID" name="MenuID" required><br><br>
    
    <label for="ProductName">Product Name:</label>
    <input type="text" id="ProductName" name="ProductName" required><br><br>
    
    <label for="adminID_fk">Admin ID:</label>
    <input type="text" id="adminID_fk" name="adminID_fk" required><br><br>
    
    <input type="submit" value="Add Menu Item">
</form>

<form action="deleteMenuItem.php" method="post">
    <label for="MenuID">Menu ID:</label>
    <input type="text" id="MenuID" name="MenuID" required><br><br>
    
    <input type="submit" value="Delete Menu Item">
</form>

</div>

  

</html>
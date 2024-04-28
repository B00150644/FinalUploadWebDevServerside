<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'Templates/Header.php'; ?>
    <style>
        .containermenu {
            display: flex;
        }
        .contentmenu {
            flex: 1;
            max-width: 65%;
        }
        .sidebar {
            flex: 1;
            max-width: 35%;
            background-color: #f0f0f0; 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .sidebar .image-container {
            position: relative;
            margin-bottom: 10px;
            width: auto;
            height: 40%; 
        }
        .sidebar img {
            width: 100%;
            height: 100%;
        }
        .reservation-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 20px;
            background-color: #333;
            font-family: Arial, sans-serif;
            color: white;
            border: none;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .image-container:hover .reservation-button {
            opacity: 1;
        }
    </style>
</head>
<body>

<div class="containermenu">
    <div class="contentmenu">
        
        <div class="menucontent">
       
            <?php require 'menumethod.php'; ?>
            
            
        </div>
    </div>
    <div class="sidebar">
        <div class="image-container">
            <img src="images/pasta1.jpg" alt="Image 1">
            <button class="reservation-button" onclick="window.location.href = 'reservation.php';">Make Reservation</button>
        </div>
        <div class="image-container">
            <img src="images/pasta2.jpg" alt="Image 2">
            <button class="reservation-button" onclick="window.location.href = 'reservation.php';">Make Reservation</button>
        </div>
        <div class="image-container">
            <img src="images/pizza.jpg" alt="Image 3">
            <button class="reservation-button" onclick="window.location.href = 'reservation.php';">Make Reservation</button>
        </div>
    </div>
</div>

<?php require 'Templates/footer.php'; ?>

</body>
</html>

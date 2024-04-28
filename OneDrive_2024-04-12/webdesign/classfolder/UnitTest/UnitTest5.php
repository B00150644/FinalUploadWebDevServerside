
<?php
echo "Unit Test Menu :" . "<br>" . "<br>";
echo "This is to validate the Menu information and displays each row from the database:" . "<br>" . "<br>";
require '../menumethodtest.php';
require '../../connection.php';
$menuHandler = new MenuHandler($connection);

$menuItems = $menuHandler->getMenuItems();

foreach ($menuItems as $menuItem) {
    echo "MenuID: " . $menuItem->getMenuId() . ", ProductName: " . $menuItem->getProductName() . ", AdminID: " . $menuItem->getAdminId() . "<br>";
}

$connection->closeConnection();
?>

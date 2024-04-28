<?php
require 'connection.php'; 
require 'classfolder/menuclass.php'; 

// Create an instance of the Menu class
$menu = new Menu($conn);

try {
    // Get the menu items
    $menuItems = $menu->getMenuItems();

    // Display the menu
    if (!empty($menuItems)) {
        
        echo "<table>
                <thead>
                    <tr>
                        <th>MenuID</th>
                        <th>ProductName</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($menuItems as $menuItem) {
            echo "<tr>
                    <td>{$menuItem["MenuID"]}</td>
                    <td>{$menuItem["ProductName"]}</td>
                </tr>";
        }
        echo "</tbody></table>";
        echo "All menu Items can be made for kids sizes :" . "<br>" . "<br>";
    } else {
        echo "No results found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

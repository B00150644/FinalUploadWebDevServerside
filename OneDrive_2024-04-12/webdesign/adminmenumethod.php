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
        echo "<form method='POST'>";
        echo "<table>
                <thead>
                    <tr>
                        <th>MenuID</th>
                        <th>ProductName</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($menuItems as $menuItem) {
            echo "<tr>
                    <td>{$menuItem["MenuID"]}</td>
                    <td><input type='text' name='ProductName[]' value='{$menuItem["ProductName"]}'></td>
                    <td>
                        <input type='hidden' name='MenuID[]' value='{$menuItem["MenuID"]}'>
                        <input type='submit' name='updateMenuItem' value='Update'>
                    </td>
                </tr>";
        }
        echo "</tbody></table>";
        echo "</form>";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateMenuItem"])) {
            // Get form data
            $menuIDs = $_POST["MenuID"];
            $productNames = $_POST["ProductName"];

            // Update each menu item
            for ($i = 0; $i < count($menuIDs); $i++) {
                $MenuID = $menuIDs[$i];
                $ProductName = $productNames[$i];

                try {
                    // Prepare SQL statement to update data
                    $sql = "UPDATE menu SET ProductName = :ProductName WHERE MenuID = :MenuID";
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        'ProductName' => $ProductName,
                        'MenuID' => $MenuID
                    ]);

                    
                } catch (PDOException $e) {
                    echo "Error updating record with MenuID $MenuID: " . $e->getMessage() . "<br>";
                }
            }
        }
    } else {
        echo "No results found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>

<?php
class Menu
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function getMenuItems()
    {
        $menuItems = [];
    
        $sql = "SELECT MenuID, ProductName, adminID_fk FROM menu";
        $stmt = $this->conn->query($sql);
    
        if ($stmt !== false) { // Check if query was successful
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $menuItems[] = $row;
            }
        } else {
         
        }
    
        return $menuItems;
    }

    public function updateMenuItem($menuID, $productName)
    {
        try {
            // Prepare SQL statement to update the product name of the menu item
            $sql = "UPDATE menu SET ProductName = :productName WHERE MenuID = :menuID";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
            $stmt->bindParam(':menuID', $menuID, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor(); // Close cursor to allow for re-execution of statement
            return true; // Return true if update successful
        } catch (PDOException $e) {
            return false; // Return false if update failed
        }
    }
    
}

?>

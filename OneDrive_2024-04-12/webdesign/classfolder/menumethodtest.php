<?php

require 'menuclasstest.php';

//rename the menuhandler looks chatted


class MenuHandler {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection->getConnection();
    }

    public function getMenuItems() {
        $sql = "SELECT MenuID, ProductName, adminID_fk FROM menu"; 
        $stmt = $this->conn->query($sql);

        $menuItems = array();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $menuItem = new MenuItem();
                $menuItem->setMenuId($row['MenuID']);
                $menuItem->setProductName($row['ProductName']);
                $menuItem->setAdminId($row['adminID_fk']);
                $menuItems[] = $menuItem;
            }
        }

        return $menuItems;
    }
}
?>

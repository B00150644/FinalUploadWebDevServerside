<?php

class MenuItem {
    private $menuId;
    private $productName;
    private $adminId;

    public function getMenuId() {
        return $this->menuId;
    }

    public function setMenuId($menuId) {
        $this->menuId = $menuId;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
    }

    public function getAdminId() {
        return $this->adminId;
    }

    public function setAdminId($adminId) {
        $this->adminId = $adminId;
    }
}

?>

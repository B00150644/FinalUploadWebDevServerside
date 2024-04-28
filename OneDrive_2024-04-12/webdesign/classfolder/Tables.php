<?php
class Tables {
  public $tableID;
  public $tableSize;
  public $tableAvailability; // Corrected property name
 
  public function setTableID($tableID) {
      $this->tableID = $tableID;
  }
  
  public function getTableID() {
      return $this->tableID;
  }
   
  public function setTableSize($tableSize) {
      $this->tableSize = $tableSize;
  }
  
  public function getTableSize() {
      return $this->tableSize;
  }
  
  public function setTableAvailability($tableAvailability) { // Corrected method name
      $this->tableAvailability = $tableAvailability; // Corrected property name
  }
  
  public function getTableAvailability() { // Corrected method name
      return $this->tableAvailability; // Corrected property name
  }
  
  // Display method declaration
  public function displayTables() {
      echo "Unit Test of Tables:" . "<br>" . "<br>";
      echo "ID:  " . $this->getTableID() . "<br>";
      echo "Size: " . $this->getTableSize() . "<br>";
      echo "Availability: " . $this->getTableAvailability() . "<br>" . "<br>" . "<br>";
  }
}
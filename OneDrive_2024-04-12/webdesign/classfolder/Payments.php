<?php
class Payments {
  private $total;
  private $cardNo; // Changed to match the input name
  private $cardName;
  private $cardType;

  public function setCardName($cardName) {
      $this->cardName = $cardName;
  }
  
  public function getCardName() {
      return $this->cardName;
  }

  public function setcardNo($cardNo) { // Changed to match the input name
      $this->cardNo = $cardNo;
  }
  
  public function getcardNo() { // Changed to match the input name
      return $this->cardNo;
  }

  public function setCardType($cardType) {
      $this->cardType = $cardType;
  }
  
  public function getCardType() {
      return $this->cardType;
  }

  public function setTotal($total) {
      $this->total = $total;
  }
  
  public function getTotal() {
      return $this->total;
  }
 // Display method declaration
 public function displayPayments() {
    echo "Unit Test for Payments:" . "<br>" . "<br>";
    echo "Card Name:  " . $this->getCardName() . "<br>";
    echo "Card Number: " . $this->getCardNo() . "<br>";
    echo "Card Type: " . $this->getCardType() . "<br>";
    echo "Total: " . $this->getTotal() . "<br>" . "<br>";
  }
}

 
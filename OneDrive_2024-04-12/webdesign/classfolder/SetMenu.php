<?php
class SetMenu {
    public $price;
    public $course3;
    public $course2;
    public $kidsMeal;
   
      public function setPrice($price) {
        $this->price = $price;
      }
      public function getPrice() {
        return $this->price;
      }
     
      public function setCourse3($course3) {
        $this->course3 = $course3;
      }
      public function getCourse3() {
        return $this->course3;
      }

      public function setCourse2($course2) {
        $this->course2 = $course2;
      }
      public function getCourse2() {
        return $this->course2;
      }

      public function setKidsMeal($kidsMeal) {
        $this->kidsMeal = $kidsMeal;
      }
      public function getKidsMeal() {
        return $this->kidsMeal;
      }
    }

      

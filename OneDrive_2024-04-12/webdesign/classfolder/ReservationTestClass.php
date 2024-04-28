<?php
class ReservationTestClass{
    public $reservationID;
    public $date;
    public $time;
    public $attendence;
    public $cancelled;
    public $guestNo;
    public $adminID;
    public $accountNo;
    public $tableID;

    public function setReservationID($reservationID) {
        $this->reservationID = $reservationID;
      }
    public function getReservationID() {
        return $this->reservationID;
    }

    public function setDate($date) {
        $this->date = $date;
      }
    public function getDate() {
        return $this->date;
    }

    public function setTime($time) {
        $this->time = $time;
      }
    public function getTime() {
        return $this->time;
    }

    public function setAttendence($attendence) {
        $this->attendence = $attendence;
      }
    public function getAttendence() {
        return $this->attendence;
    } 
    
    public function setCancelled($cancelled) {
        $this->cancelled = $cancelled;
      }
    public function getCancelled() {
        return $this->cancelled;
    } 

    public function setGuestNo($guestNo) {
        $this->guestNo = $guestNo;
      }
    public function getGuestNo() {
        return $this->guestNo;
    } 

    public function setAdminID($adminID) {
        $this->adminID = $adminID;
      }
    public function getAdminID() {
        return $this->adminID;
    } 

    public function setAccountNo($accountNo) {
        $this->accountNo = $accountNo;
      }
    public function getAccountNo() {
        return $this->accountNo;
    }
    
    public function setTableID($tableID) {
        $this->tableID = $tableID;
      }
    public function getTableID() {
        return $this->tableID;
    }
     // Display method declaration
     public function displayReservations() {
        echo "Reservation Unit Test:" . "<br>" . "<br>";
        echo "Reservation ID: " . $this->getReservationID() . "<br>";
        echo "Date: " . $this->getDate() . "<br>";
        echo "Time: " . $this->getTime() . "<br>";
        echo "Attendence: " . $this->getAttendence() . "<br>";
        echo "Cancelled: " . $this->getCancelled() . "<br>";
        echo "Guest Number: " . $this->getGuestNo() . "<br>";
        echo "Admin ID: " . $this->getAdminID() . "<br>";
        echo "Account Number: " . $this->getAccountNo() . "<br>";
        echo "Table ID: " . $this->getTableID() . "<br>" . "<br>";
    }
}

?>
<?php
require 'Reservations.php'; 
require 'Tables.php'; 
require 'SetMenu.php';
require 'Payments.php';
require 'connection.php';

class ReservationClass{
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
}
    //reservation object
    $reservation = new ReservationClass();
        $reservation->setReservationID($next_reservation_no); //comes from r
        $reservation->setDate($_POST["date"]);
        $reservation->setTime($_POST["time"]);
        $reservation->setAttendence("False");
        $reservation->setCancelled("False");
        $reservation->setGuestNo($_POST["number"]);
        $reservation->setAdminID("1");
        $reservation->setTableID($tableID); //comes from r


        
    //table object
    $table = new Tables();
        $table->setTableSize($_POST["number"]);
            
    //setMenu object
    $setMenu = new SetMenu();
        $setMenu->setCourse3($_POST["3course"]);
        $setMenu->setCourse2($_POST["2course"]);
        $setMenu->setKidsMeal($_POST["kids"]);

    //PAYMENTS object           
    $payment = new Payments();
        $payment->setTotal($total); //comes from r
        $payment->setCardNo($_POST["CardNo"]);
        $payment->setCardName($_POST["Cardname"]);
        $payment->setCardType($_POST["cardtype"]);               
?>
<?php

require '../ReservationTestClass.php';


$reservation1 = new ReservationTestClass();
$reservation2 = new ReservationTestClass();

        // First reservation Unit Test
        $reservation1->setReservationID('123456'); 
        $reservation1->setDate('2024-04-25'); 
        $reservation1->setTime('19:00:00'); 
        $reservation1->setAttendence('False'); 
        $reservation1->setCancelled('True'); 
        $reservation1->setGuestNo('4');
        $reservation1->setAdminID('1'); 
        $reservation1->setAccountNo('12'); 
        $reservation1->setTableID('10'); 
         // First reservation Unit Test
         $reservation2->setReservationID('5');
         $reservation2->setDate('2024-08-2');
         $reservation2->setTime('09:00:00'); 
         $reservation2->setAttendence('True'); 
         $reservation2->setCancelled('False'); 
         $reservation2->setGuestNo('2'); 
         $reservation2->setAdminID('1');
         $reservation2->setAccountNo('45'); 
         $reservation2->setTableID('1'); 
       
        $reservation1->displayReservations();
        $reservation2->displayReservations();
?>
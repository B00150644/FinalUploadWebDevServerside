<?php
require '../Payments.php';


// This is a Unit Test for the Payments Class 
$payment1 = new Payments();
$payment2 = new Payments();

// First Payment Test
        $payment1->setTotal('45');
        $payment1->setCardNo('1111-2222-3333-4444');
        $payment1->setCardName("John Doe");
        $payment1->setCardType("Visa");

        // Second Payment Test
        $payment2->setTotal('1050');
        $payment2->setCardNo('1111222233334444');
        $payment2->setCardName("Jane Smith");
        $payment2->setCardType("MasterCard");

        $payment1->displayPayments();
        $payment2->displayPayments();

       
?>
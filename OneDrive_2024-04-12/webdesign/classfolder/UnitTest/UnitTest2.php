<?php
require '../Tables.php';



// This is a Unit Test for the Tables Class 
$table1 = new Tables();
$table2 = new Tables();

        // First Table Test
        $table1->setTableID('5');
        $table1->setTableSize('10');
        $table1->setTableAvailability("True");

        // Second Table Test
        $table2->setTableID('1000000');
        $table2->setTableSize('0');
        $table2->setTableAvailability("False");

        $table1->displayTables();
        $table2->displayTables();

?>

<?php 

require 'connection.php';
require 'Tables.php'; 
require 'SetMenu.php';
require 'Payments.php';


class Reservations{
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection->getConnection();
    }

    private function equivalencefield($fieldName,$data){
        $ErrMsg="";
        if (empty($data)) {
            $ErrMsg = "Please fill in all mandatory fields.";
             }
        else{
            if($fieldName == 'number'){
                $data = trim($data);
                $num = intval($data);;
                if($num<0 || $num>16){
                    $ErrMsg = "Invalid number of people";
                }
                
            }
            else if($fieldName == 'cardNo'){
                $pattern="^[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]^";
                if(!preg_match($pattern,$data)){
                    $ErrMsg = "Invalid Card number";
                }
            }
            else if($fieldName =='cardType' and !($data=='mastercard' or $data=='visa')){              
                    $ErrMsg = "Invalid Card Type";
            }
            
        }
        return $ErrMsg;
    }

    public function handleFormSubmission() {
        // Form submission handling
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                // Validate mandatory fields
                $mandatoryFields = ['date', 'time', 'number', 'cardType', 'cardNo', 'cardName'];
                foreach ($mandatoryFields as $field) {
                    $Err = $this->equivalencefield($field,$_POST[$field]);
                    if (!empty($Err)) {
                             throw new Exception($Err);
                     }
                }


                // Get the number of 3-course, 2-course, and kids meals (optional fields)
                $threeCourse = isset($_POST['3course']) ? intval($_POST['3course']) : 0;
                $twoCourse = isset($_POST['2course']) ? intval($_POST['2course']) : 0;
                $kidsMeal = isset($_POST['kids']) ? intval($_POST['kids']) : 0;

                // Check if there are available tables
                $tableSize = $_POST["number"];
                $stmt = $this->conn->prepare("SELECT TableID, Size, Availability FROM Tables WHERE Size = :size AND Availability = 'True'");
                $stmt->bindParam(':size', $tableSize);
                $stmt->execute();
                
                if ($stmt->rowCount() > 0) {

                    // Retrieve the first available table
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $tableID = $row["TableID"];
                        
                    // Update table availability to false for the matching table
                    $updateSql = "UPDATE Tables SET Availability = 'False' WHERE TableID = :tableID";
                    $updateStmt = $this->conn->prepare($updateSql);
                    $updateStmt->bindParam(':tableID', $tableID);
                    $updateStmt->execute();                

                    // Calculate total price based on selected meals
                    $total = 0;
                    $setDinners = [1 => $threeCourse, 2 => $twoCourse, 3 => $kidsMeal];
                    foreach ($setDinners as $setDinnerID => $quantity) {
                        $priceSql = "SELECT SetDinnerID, Price FROM SetDinners WHERE SetDinnerID = :setDinnerID";
                        $stmt = $this->conn->prepare($priceSql);
                        $stmt->bindParam(':setDinnerID', $setDinnerID);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            $priceRow = $stmt->fetch(PDO::FETCH_ASSOC);
                            $total += intval($priceRow["Price"]) * $quantity;
                        }
                    }

                    // Find the maximum PaymentID and ReservationID currently in use
                    $nextPaymentNo = $this->getNextID('PaymentID', 'payment');
                    $nextReservationNo = $this->getNextID('ReservationID', 'reservations');

                    // Insert data into the Payments table
                    $payments_sql = "INSERT INTO payment (PaymentID, CardType, CardNo, Cardname, Total, SetDinnerID_fk, ReservationID_Fk)
                                    VALUES (:nextPaymentNo, :cardType, :cardNo, :cardName, :total, '1', :nextReservationNo)";
                    $stmtPayments = $this->conn->prepare($payments_sql);
                    $stmtPayments->bindParam(':nextPaymentNo', $nextPaymentNo);
                    $stmtPayments->bindParam(':cardType', $_POST['cardType']);
                    $stmtPayments->bindParam(':cardNo', $_POST['cardNo']);
                    $stmtPayments->bindParam(':cardName', $_POST['cardName']);
                    $stmtPayments->bindParam(':total', $total);
                    $stmtPayments->bindParam(':nextReservationNo', $nextReservationNo);

                    if ($stmtPayments->execute()) {
                        echo "New Payment record created successfully<br>";
                        header("location:Confirmation.php" );
                    } else {
                        throw new Exception("Error creating payment record: " . $stmtPayments->errorInfo()[2]);
                    }

                    // Insert data into the Reservations table
                    $date = $_POST['date'];
                    $time = $_POST['time'];

                    
                    $adminID = 1;
                    $accountNoRes = $_SESSION['sessionNum'];

                    $reservation_sql = "INSERT INTO reservations (ReservationID, Date, Time, GuestNo, Attendence, Cancelled, AccountNo_fk, adminID_fk2, TableID_FK)
                    VALUES (:nextReservationNo, :date, :time, :tableSize, 'false', 'false', :accountNo, :adminID, :matchingTableID)";
                    $stmtReservation = $this->conn->prepare($reservation_sql);
                    $stmtReservation->bindParam(':nextReservationNo', $nextReservationNo);
                    $stmtReservation->bindParam(':date', $date);
                    $stmtReservation->bindParam(':time', $time);
                    $stmtReservation->bindParam(':tableSize', $tableSize);
                    $stmtReservation->bindParam(':accountNo', $accountNoRes);
                    $stmtReservation->bindParam(':adminID', $adminID);
                    $stmtReservation->bindParam(':matchingTableID', $tableID);
                    
                    if ($stmtReservation->execute()) {
                        echo "New Reservation record created successfully";
                    } else {
                        throw new Exception("Error creating reservation record: " . $stmtReservation->errorInfo()[2]);
                    }
                } else {
                    throw new Exception("There are no available tables.");
                }
            } catch (Exception $e) {
                // Handle the exception
                echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
            }
        }
    }

    

    private function getNextID($columnName, $tableName) {
        $sql = "SELECT MAX($columnName) AS max_id FROM $tableName";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;
    }

}
?>

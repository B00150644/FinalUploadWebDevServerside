<?php
require 'connection.php'; 


class AccountReservation  {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection->getConnection();
    }

    public function getAccountReservations(){
        $reservationData = array(); // Array to store reservation information

        // Check if $_SESSION['Username'] is set
        if (isset($_SESSION['Username'])) {
            $reservationSql = "SELECT r.ReservationID, r.Date, r.Time, r.GuestNo, r.Attendence, r.Cancelled, r.AccountNo_fk, r.TableID_FK, r.adminID_fk2, u.UserName
                  FROM reservations r
                  INNER JOIN user u ON r.AccountNo_fk = u.SessionID - 1
                  WHERE u.UserName = ?";

            // Prepare the SQL statement
            $stmt = $this->conn->prepare($reservationSql);
            $stmt->bindParam(1, $_SESSION['Username'], PDO::PARAM_STR);

            // Execute the query
            if ($stmt->execute()) {
                // Fetch all rows
                $reservationData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // query execution error
                $reservationData = array();
            }
        } else {
            // $_SESSION['Username'] not set
        }

        // Return the reservation data
        return $reservationData;
    }
}
?>
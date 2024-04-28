

<?php
// Check if reservation ID is set and not empty
if (isset($_POST['Reservationid']) && !empty($_POST['Reservationid'])) {
    // Get reservation ID from POST data
    $reservation_id = $_POST['Reservationid'];

    // Include database connection
    require 'connection.php';

    // Perform deletion query
    $sql = "DELETE FROM reservations WHERE ReservationID = :Reservationid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Reservationid', $reservation_id, PDO::PARAM_INT);
    
    // Execute the deletion query
    if ($stmt->execute()) {
        // Deletion successful
        // echo "Reservation deleted successfully.";
    } else {
        // Deletion failed
        echo "Error deleting reservation.";
    }

}
?>
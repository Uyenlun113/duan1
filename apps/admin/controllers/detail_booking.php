<?php 
include_once "../../../../configs/configs.php";
function cancelBooking($id){
    try {
        $conn = pdo_get_connection(); 
        $sql = "UPDATE bookingroom SET status = 0 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

if (isset($_GET['cancel_booking_id'])) {
    $id = $_GET['cancel_booking_id'];
    $id_booking = $_GET['detail_booking_id'];
    $deleteResult = cancelBooking($id);
    if ($deleteResult) {
          header("location: details_booking.php?detail_booking_id=$id_booking");
        exit;
    } else {
        echo "Error cancelling booking!";
    }
}

?>
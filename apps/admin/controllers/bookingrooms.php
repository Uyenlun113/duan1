<?php
    include_once "../../../../configs/configs.php";
    //list danh sách
    function getAllBooking() {
            $options = array('order_by' => 'id');
            return get_all('bookings', $options);
        }
    $list_booking = getAllBooking();
 function getAllDetialBooking($id_booking) {
            $options = array('where'=>"id_booking = $id_booking");
            
            return get_all('bookingroom', $options);
        }

        if (isset($_GET['detail_booking_id'])) {
    $id_booking = $_GET['detail_booking_id'];
    $list_detail_booking = getAllDetialBooking($id_booking);

   
}


    if (intval($_GET['detail_booking_id'])) {
        $subCateId = intval($_GET['detail_booking_id']);
        return $detailbooking = get_a_data('bookings', $subCateId);
    }
   
        function getAllRoom() {
            $options = array('order_by' => 'id');
            return get_all('rooms', $options);
        }
        $list_rooms = getAllRoom();
        

function getBookingDetails($bookingId) {
    $where = "id = $bookingId"; 
    return get_a_data('bookings', $where);
}



function cancelBooking($id){
    try {
        $conn = pdo_get_connection(); 
        $sql = "UPDATE bookings SET status = 0 WHERE id = :id";
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
    $deleteResult = cancelBooking($id);
    if ($deleteResult) {
        header('location: listbooking.php?controller=bookingrooms');
        exit;
    } else {
        echo "Error cancelling booking!";
    }
}

    

 function addBooking($name_account, $CCCD, $tel, $payment,$address,$status) {
        $data = array(
            'name_account' => $name_account,
            'CCCD' => $CCCD,
            'tel' => $tel,
            'payment' => $payment,
            'address' =>$address,
            'status' =>$status,
            'create_date' => date('Y-m-d')
        );
        return save_and_get_result('bookings', $data);
    }

    function addBookingRoom($id_booking, $id_room, $checkin, $check_out) {
        $data = array(
            'id_booking' => $id_booking,
            'id_room' => $id_room,
            'checkin' => $checkin,
            'check_out' => $check_out,
            'total_price' => 100,
            'status' => 1,
            'create_date' => date('Y-m-d')
        );
        $result = save_and_get_result('bookingroom', $data);
        return $result;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_booking"])) {
            $name_account = $_POST["name_account"];
            $CCCD = $_POST["CCCD"];
            $tel = $_POST["tel"];
            $payment = $_POST["payment"];
            $address = $_POST["address"];
            $status = $_POST["status"];
            $addResultBookings = addBooking($name_account, $CCCD, $tel, $payment,$address,$status);
            $rooms = isset($_POST["room_id"]) ? $_POST["room_id"] : array();
            $checkinDates = isset($_POST["checkin"]) ? $_POST["checkin"] : array();
            $checkoutDates = isset($_POST["checkout"]) ? $_POST["checkout"] : array();
             for ($i = 0; $i < count($rooms); $i++) {
                $room_id = $rooms[$i];
                $checkin_date = $checkinDates[$i];
                $checkout_date = $checkoutDates[$i];
                $addResultBookingsRoom = addBookingRoom($addResultBookings['lastInsertId'],  $room_id, $checkin_date, $checkout_date);                 
            }  
            if ($addResultBookings && $addResultBookingsRoom) {
                header('location: listbooking.php?controller=bookingrooms');
            }
        } 
    }



?>
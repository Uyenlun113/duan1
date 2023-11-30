<?php
    include_once "../../../../configs/configs.php";
    function getAllBooking() {
            $options = array('order_by' => 'id');
            return get_all('bookings', $options);
        }
    $list_booking = getAllBooking();

        function getAllCategory() {
            $options = array('order_by' => 'id');
            return get_all('category', $options);
        }
    $list_category = getAllCategory();
   
function getAllDetailBooking($id_booking) {
    $options = array(
        'select' => 'bookingroom.*, rooms.name AS room_name, rooms.price AS room_price',
        'where' => "bookingroom.id_booking = $id_booking",
        'join' => 'JOIN rooms ON bookingroom.id_room = rooms.id'
    );
    return get_all('bookingroom', $options);
    
}
    if (isset($_GET['detail_booking_id'])) {
        $id_booking = $_GET['detail_booking_id'];   
        $list_detail_booking = getAllDetailBooking($id_booking);
        $total_money = 0;
        foreach ($list_detail_booking as $booking) {
            $total_money += $booking['room_price'];
        }
    }

    if (isset($_GET['detail_booking_id'])&&intval($_GET['detail_booking_id'])) {
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


 function addBooking($users_name, $users_phone_number,$users_email) {
        $data = array(
            'booking_code' => generateRandomString("DP",6),
            'users_name' => $users_name,
            'users_phone_number' => $users_phone_number,
            'users_email' => $users_email,
            'create_date' => date('Y-m-d')
        );
        return save_and_get_result('bookings', $data);
    }

function addBookingRoom($booking_id, $category_id, $booking_room_checkin, $booking_room_checkout, $booking_quantity) {
    $data = array(
        'booking_id' => $booking_id,
        'category_id' => $category_id,
        'booking_room_checkin' => $booking_room_checkin,
        'booking_room_checkout' => $booking_room_checkout,
        'booking_quantity' => $booking_quantity,
        'booking_total_price' =>10000,
        'create_date' => date('Y-m-d')
    );
    echo json_encode($data);

    $result = save_and_get_result('bookingroom', $data);
    return $result;
}

    function getAllBookingRoomByIdRooms($category_id) {
            $options = array('order_by' => 'id',
        "where" => "category_id = $category_id");
            return get_all('bookingroom', $options);
        }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_booking"])) {
            $users_name = $_POST["users_name"];
            $users_phone_number = $_POST["users_phone_number"];
            $users_email = $_POST["users_email"];
            $list_booking_rooms = isset($_POST["repeater"]) ? $_POST["repeater"] : array();
                $addResultBookings = addBooking($users_name, $users_phone_number,$users_email);
             for ($i = 0; $i < count($list_booking_rooms); $i++) {
                $category_id = $list_booking_rooms[$i]['category_id'];
                $booking_room_checkin = $list_booking_rooms[$i]['booking_room_checkin'];
                $booking_room_checkout =$list_booking_rooms[$i]['booking_room_checkout'];
                $booking_quantity =$list_booking_rooms[$i]['booking_quantity'];
                $addResultBookingsRoom = addBookingRoom($addResultBookings['id'],  $category_id, $booking_room_checkin, $booking_room_checkout, $booking_quantity); 
             }  
            if ($addResultBookings && $addResultBookingsRoom) {
                echo "<script>window.top.location='list_booking.php'</script>";
            }
        } 
    }



?>
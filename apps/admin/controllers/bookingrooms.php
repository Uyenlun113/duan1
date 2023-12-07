<?php
include_once '../../../../configs/configs.php';
    include_once "../../../../configs/check-auth-admin.php";


function getOrderAll()
{
    $options = array(
        'select' => 'orders.*, users.users_name, users.id as users_id',
        'order_by' => 'id',
        'join' => 'join users on users.id = orders.users_id'
    );
    return get_all('orders', $options);
}
$list_orders_all = getOrderAll();

function getOrderByStatus($status)
{
    $options = array(
        'select' => 'orders.*, users.users_name, users.id as users_id',
        'order_by' => 'id',
        'join' => 'join users on users.id = orders.users_id',
        'where' => "orders_status = $status"
    );
    return get_all('orders', $options);
}
$list_orders_pending = getOrderByStatus(1);
$list_orders_success = getOrderByStatus(2);
$list_orders_reject = getOrderByStatus(3);
$list_orders_cancel = getOrderByStatus(0);

function getAllCategory()
{
    $options = array('order_by' => 'id');
    return get_all('category', $options);
}
$list_category = getAllCategory();

if (isset($_GET['detail_oders_item']) && intval($_GET['detail_oders_item'])) {
    $id = intval($_GET['detail_oders_item']);
    function getListOrderItem($id)
    {
        $options = array(
            "select" => "orders_item.*, category.category_name",
            'order_by' => 'id',
            "where" => "orders_id = $id",
            "join" => "join category on orders_item.category_id = category.id"
        );
        return get_all('orders_item', $options);
    }
    $list_order_items = getListOrderItem($id);
    $detail_orders = get_a_data('orders', $id);
    $detail_users = get_a_data('users', $detail_orders['users_id']);
}


function getAllRoom()
{
    $options = array('order_by' => 'id');
    return get_all('rooms', $options);
}
$list_rooms = getAllRoom();



function addOrders($users_name, $users_phone_number, $users_email, $total_price, $booking_payment)
{
    $data = array(
        'booking_code' => generateRandomString('DP', 6),
        'users_name' => $users_name,
        'users_phone_number' => $users_phone_number,
        'users_email' => $users_email,
        'total_price' => $total_price,
        'booking_payment' => $booking_payment,
        'create_date' => date('Y-m-d')
    );
    return save_and_get_result('bookings', $data);
}

function addBookingRoom($booking_id, $category_id, $booking_room_checkin, $booking_room_checkout, $booking_quantity)
{
    $data = array(
        'booking_id' => $booking_id,
        'category_id' => $category_id,
        'booking_room_checkin' => $booking_room_checkin,
        'booking_room_checkout' => $booking_room_checkout,
        'booking_quantity' => $booking_quantity,
        'booking_total_price' => 10000,
        'create_date' => date('Y-m-d')
    );
    $result = save_and_get_result('bookingroom', $data);
    return $result;
}

function getAllBookingRoomByIdRooms($category_id)
{
    $options = array(
        'order_by' => 'id',
        'where' => "category_id = $category_id"
    );
    return get_all('bookingroom', $options);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_booking'])) {
        $users_name = $_POST['users_name'];
        $users_phone_number = $_POST['users_phone_number'];
        $users_email = $_POST['users_email'];
        $total_price = $_POST['total_price'];
        $booking_payment = $_POST['booking_payment'];
        $list_booking_rooms = isset($_POST['repeater']) ? $_POST['repeater'] : array();
        $addResultBookings = addOrder($users_name, $users_phone_number, $users_email, $total_price, $booking_payment);
        for (
            $i = 0;
            $i < count($list_booking_rooms);
            $i++
        ) {
            $category_id = $list_booking_rooms[$i]['category_id'];
            $booking_room_checkin = $list_booking_rooms[$i]['booking_room_checkin'];
            $booking_room_checkout = $list_booking_rooms[$i]['booking_room_checkout'];
            $booking_quantity = $list_booking_rooms[$i]['booking_quantity'];
            $addResultBookingsRoom = addBookingRoom($addResultBookings['id'], $category_id, $booking_room_checkin, $booking_room_checkout, $booking_quantity);

        }

        if ($addResultBookings && $addResultBookingsRoom) {
            echo "<script>window.top.location='list_booking.php'</script>";
        }
    }

}

?>
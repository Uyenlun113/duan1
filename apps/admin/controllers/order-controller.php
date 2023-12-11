<?php
include_once '../../../../configs/configs.php';
    include_once "../../../../configs/check-auth-admin.php";

function getOrderAll($search_booking)
{
   $options = array(
        'select' => 'orders.*, users.users_name, users.id as users_id',
        'order_by' => 'orders.id desc',
        'join' => 'LEFT JOIN users on users.id = orders.users_id'
    );
    if (!empty($search_booking)) {
        $options['where'] = "users.users_name LIKE '%$search_booking%' OR orders.orders_code LIKE '%$search_booking%'";
    }
    return get_all('orders', $options);
}
$searchValue = isset($_GET['search_booking']) ? htmlspecialchars($_GET['search_booking']) : '';
$list_orders_all = getOrderAll($searchValue);


function getOrderByStatus($status)
{
    $options = array(
        'select' => 'orders.*, users.users_name, users.id as users_id',
        'order_by' => 'orders.id',
        'join' => 'LEFT JOIN users on users.id = orders.users_id',
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



function addOrder($orders_user_name, $orders_user_phone, $orders_user_adders, $orders_payment_method, $orders_total, $orders_deposit, $orders_description,$orders_status)
{
    $data = array(
        'orders_code' => generateRandomString('DP', 6),
        'orders_user_name' => $orders_user_name,
        'orders_user_phone' => $orders_user_phone,
        'orders_user_adders' => $orders_user_adders,
        'orders_payment_method' => $orders_payment_method,
        'orders_total' => $orders_total,
        'orders_deposit' => $orders_deposit,
         'orders_description' => $orders_description,
         'orders_status' => 1,
        
        'create_date' => date('Y-m-d')
    );
    return save_and_get_result('orders', $data);
}

function addOrderItem($orders_id, $category_id, $orders_item_checkin, $orders_item_checkout, $orders_item_quantity)
{
    $data = array(
        'orders_id' => $orders_id,
        'category_id' => $category_id,
        'orders_item_checkin' => $orders_item_checkin,
        'orders_item_checkout' => $orders_item_checkout,
        'orders_item_quantity' => $orders_item_quantity,
        'create_date' => date('Y-m-d')
    );
    $result = save_and_get_result('orders_item', $data);
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_booking'])) {
        $orders_user_name = $_POST['orders_user_name'];
        $orders_user_phone = $_POST['orders_user_phone'];
        $orders_user_adders = $_POST['orders_user_adders'];
        $booking_payment = $_POST['booking_payment'];
        $orders_total = 0;

        $list_booking_rooms = isset($_POST['repeater']) ? $_POST['repeater'] : array();

        foreach ($list_booking_rooms as $booking_room) {
            $orders_total += $booking_room['orders_item_price'];
        }

        $orders_deposit = $_POST['orders_deposit'];
        $orders_description = $_POST['orders_description'];
         $orders_status = $_POST['orders_status'];

        $addResultOrders = addOrder($orders_user_name, $orders_user_phone, $orders_user_adders, $booking_payment, $orders_total, $orders_deposit, $orders_description,$orders_status);

        foreach ($list_booking_rooms as $booking_room) {
            $category_id = $booking_room['category_id'];
            $orders_item_checkin = $booking_room['orders_item_checkin'];
            $orders_item_checkout = $booking_room['orders_item_checkout'];
            $orders_item_quantity = $booking_room['orders_item_quantity'];
            $addResultBookingsRoom = addOrderItem($addResultOrders['id'], $category_id, $orders_item_checkin, $orders_item_checkout, $orders_item_quantity);
        }

        if ($addResultOrders && $addResultBookingsRoom) {
            echo "thành công";
            // echo "<script>window.top.location='list_booking.php'</script>";
        }
    }
}
?>
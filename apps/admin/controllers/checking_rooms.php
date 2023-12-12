<?php
include_once '../../../../configs/configs.php';
    include_once "../../../../configs/check-auth-admin.php";

    //xếp phòng
function getListCheckingRoom($search_value) {
    $options = array(
        'select' => 'checking_rooms.*,orders.*,rooms.*',
        'order_by' => 'checking_rooms.id',
        'join' => 'left JOIN orders ON orders.id = checking_rooms.orders_id  left join rooms on rooms.id = checking_rooms.rooms_id'
    );
    if (!empty($search_value)) {
        $options['where'] = "orders.orders_code LIKE '%$search_value%' OR rooms.room_code LIKE '%$search_value%'";
    }
    return get_all( 'checking_rooms', $options );
}
$search_value = isset($_GET['search_value']) ? htmlspecialchars($_GET['search_value']) : '';
$list_checking_rooms = getListCheckingRoom($search_value);
?>
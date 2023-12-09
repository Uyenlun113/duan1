<?php
include_once '../../../../configs/configs.php';
include_once "../../../../configs/check-auth-admin.php";

if ( isset( $_GET[ 'update_rooms' ] ) ) {
    $room_id = intval( $_GET[ 'update_rooms' ] );
    $detail_rooms = get_a_data( 'rooms', $room_id );
}
if (isset($_SESSION['login_admin'])) {
    $dataLoginUser = $_SESSION['login_admin'];
}
?>
<?php
session_start();
if (isset($_SESSION['login_admin'])) {
    $dataLoginUser = $_SESSION['login_admin'];
}
function checkLogin()
{
    if (!isset($_SESSION['login_admin'])) {
        header('Location: ../auth/login.php');
    }
}
checkLogin();

// // Kiểm tra quyền phòng
$isCreateRoom = strpos($dataLoginUser['permission_codes'], 'CREATE_ROOM') !== false ?? false;
$isDeleteRoom = strpos($dataLoginUser['permission_codes'], 'DELETE_ROOM') !== false ?? false;
$isUpdateRoom = strpos($dataLoginUser['permission_codes'], 'UPDATE_ROOM') !== false ?? false;

// Kiểm tra quyền nhân viên
$isDeleteStaff = strpos($dataLoginUser['permission_codes'], 'DELETE_STAFF') !== false ?? false;
$isCreateStaff = strpos($dataLoginUser['permission_codes'], 'CREATE_STAFF') !== false ?? false;

//Kiểm tra quyền đặt phòng
$isCreateBooking = strpos($dataLoginUser['permission_codes'], 'CREATE_ORDER') !== false ?? false;
$isViewListCheckingRoom = strpos($dataLoginUser['permission_codes'], 'VIEW_LIST_CHECKING_ROOM') !== false ?? false;
$isComfirmBooking = strpos($dataLoginUser['permission_codes'], 'COMFIRM_BOOKING') !== false ?? false;
$isCancelBooking = strpos($dataLoginUser['permission_codes'], 'CANCEL_BOOKING') !== false ?? false;
$isViewListCheckingRoom = strpos($dataLoginUser['permission_codes'], 'VIEW_LIST_CHECKING_ROOM') !== false ?? false;

$isList = strpos($dataLoginUser['permission_codes'], 'VIEW_LIST_THONGKE') !== false ?? false;
?>
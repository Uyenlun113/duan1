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

// // Kiểm tra quyền CREATE_ROOM
$isCreateRoom = strpos($dataLoginUser['permission_codes'], 'CREATE_ROOM') !== false ?? false;
$isDeleteRoom = strpos($dataLoginUser['permission_codes'], 'DELETE_ROOM') !== false ?? false;
$isUpdateRoom = strpos($dataLoginUser['permission_codes'], 'UPDATE_ROOM') !== false ?? false;
$isDeleteStaff = strpos($dataLoginUser['permission_codes'], 'DELETE_STAFF') !== false ?? false;
?>
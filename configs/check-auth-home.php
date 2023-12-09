<?php
session_start();
if (isset($_SESSION['login_home'])) {
    $dataLoginUser = $_SESSION['login_home'];
}

function checkLogin()
{
    if (!isset($_SESSION['login_home'])) {
        header('Location: login.php');
    }
}
checkLogin();
?>
<?php 
   @include "../../configs/configs.php";
   session_start();

    if(isset($_SESSION['login_home'])) {
        $userData = $_SESSION['login_home'];
    } 
?>
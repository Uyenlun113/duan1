<?php
session_start();

// Unset the specific session variable
unset($_SESSION['login_home']);

// Redirect to the login page
header("Location: index.php");
exit;
?>
<?php
  include_once "../../../../configs/configs.php";
  session_start();
  echo json_encode( $_SESSION[ 'login_admin' ] );
?>
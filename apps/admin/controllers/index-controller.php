<?php
  include_once "../../../../configs/configs.php";
      include_once "../../../../configs/check-auth-admin.php";

  session_start();
  echo json_encode( $_SESSION[ 'login_admin' ] );
?>
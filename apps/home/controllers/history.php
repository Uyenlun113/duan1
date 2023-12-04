<?php 

   @include "../../configs/configs.php";

    if(isset($_SESSION['data_login'])) {
        $userData = $_SESSION['data_login'];
    } else {
        echo "<script>window.top.location='login.php'</script>";
    }

    function getAllOrders($userData) {
      $options = array(
        'order_by' => 'orders.id',
        'where' => 'users_id = ' . $userData["id"],
      );
      return get_all('orders', $options);
    }
    $list_all_orders = getAllOrders($userData);

    function getWaitingOrders($userData) {
      $options = array(
        'order_by' => 'orders.id',
        'where' => 'orders_status = 1 and users_id = ' . $userData["id"],
      );
      return get_all('orders', $options);
    }
    $list_waiting_orders = getWaitingOrders($userData);

 function getSuccessOrders($userData) {
      $options = array(
        'order_by' => 'orders.id',
        'where' => 'orders_status = 2 and users_id = ' . $userData["id"],
      );
      return get_all('orders', $options);
    }
    $list_success_orders = getSuccessOrders($userData);

     function getRejectOrders($userData) {
      $options = array(
        'order_by' => 'orders.id',
        'where' => 'orders_status = 3 and users_id = ' . $userData["id"],
      );
      return get_all('orders', $options);
    }
    $list_reject_orders = getRejectOrders($userData);

    function getCancelOrders($userData) {
      $options = array(
        'order_by' => 'orders.id',
        'where' => 'orders_status = 0 and users_id = ' . $userData["id"],
      );
      return get_all('orders', $options);
    }
    $list_cancel_orders = getCancelOrders($userData);
?>
<?php
@include "../../configs/configs.php";
session_start();

if (isset($_SESSION['login_home'])) {
  $userData = $_SESSION['login_home'];
} else {
  header("Location: login.php");
}

function getAllOrders($userData)
{
  $options = array(
    'order_by' => 'orders.id',
    'where' => 'users_id = ' . $userData["id"],
  );
  return get_all('orders', $options);
}
$list_all_orders = getAllOrders($userData);
function getWaitingOrders($userData)
{
  $options = array(
    'order_by' => 'orders.id',
    'where' => 'orders_status = 1 and users_id = ' . $userData["id"],
  );
  return get_all('orders', $options);
}
$list_waiting_orders = getWaitingOrders($userData);

function getSuccessOrders($userData)
{
  $options = array(
    'order_by' => 'orders.id',
    'where' => 'orders_status = 2 and users_id = ' . $userData["id"],
  );
  return get_all('orders', $options);
}
$list_success_orders = getSuccessOrders($userData);

function getRejectOrders($userData)
{
  $options = array(
    'order_by' => 'orders.id',
    'where' => 'orders_status = 3 and users_id = ' . $userData["id"],
  );
  return get_all('orders', $options);
}
$list_reject_orders = getRejectOrders($userData);

function getCancelOrders($userData)
{
  $options = array(
    'order_by' => 'orders.id',
    'where' => 'orders_status = 0 and users_id = ' . $userData["id"],
  );
  return get_all('orders', $options);
}
$list_cancel_orders = getCancelOrders($userData);


function handleCancelOrder($id)
{
  $data = array(
    'orders_status' => 0,
    'update_date' => date('Y-m-d')
  );
  $where = "id = $id";
  return update_data('orders', $data, $where);
}
if (isset($_GET['cancel_order_id'])) {
  $idOrder = $_GET['cancel_order_id'];
  $cancelOrderResuilt = handleCancelOrder($idOrder);
  if ($cancelOrderResuilt) {
    header('Location: history.php');
  }
}
?>
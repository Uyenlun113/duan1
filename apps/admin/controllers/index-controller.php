<?php
include_once "../../../../configs/configs.php";
include_once "../../../../configs/check-auth-admin.php";
session_start();



if (isset($_GET['current_year'])) {
  $currentYear = $_GET['current_year'];
} else {
  $currentYear = date('Y');
}

function getRevenue($currentYear)
{
  $conn = pdo_get_connection();
  if ($conn === null) {
    return array();
  }
  try {
    $sql = "SELECT months.month,COALESCE(SUM(orders_total), 0) AS total_orders FROM (SELECT 1 AS month UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12) AS months LEFT JOIN orders AS orders ON 
    EXTRACT(MONTH FROM orders.create_date) = months.month AND EXTRACT(YEAR FROM orders.create_date) = '$currentYear' AND (orders.orders_status) = 2 GROUP BY 
    months.month ORDER BY months.month;";
    $query = $conn->query($sql);
    $data = array();
    if ($query) {
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
    }
    return $data;
  } catch (PDOException $e) {
    return array();
  }
}

$listRevenue = getRevenue($currentYear);
$resultListRevenue = array_map('intval', array_column($listRevenue, 'total_orders'));


function getOrderAll()
{
  $options = array(
    'select' => 'orders.*, users.users_name , users.id as users_id',
    'order_by' => 'orders.id desc',
    'join' => 'LEFT JOIN users on users.id = orders.users_id'
  );
  return get_all('orders', $options);

}
$list_orders_all = getOrderAll();


function getOrderByStatus($status)
{
  $options = array(
    'select' => 'orders.*, users.users_name, users.id as users_id',
    'order_by' => 'orders.id',
    'join' => 'LEFT JOIN users on users.id = orders.users_id',
    'where' => "orders_status = $status"
  );
  return get_all('orders', $options);
}
$list_orders_pending = getOrderByStatus(1);
$list_orders_success = getOrderByStatus(2);
$list_orders_reject = getOrderByStatus(3);
$list_orders_cancel = getOrderByStatus(0);
?>
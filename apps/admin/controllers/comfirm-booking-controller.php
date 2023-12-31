<?php
include_once "../../../../configs/configs.php";
    include_once "../../../../configs/check-auth-admin.php";


if (isset($_GET['comfirm-booking'])) {
  $id_order = $_GET['comfirm-booking'];
}
function getListOrderItemById($id_order)
{
  $options = array(
    'select' => 'orders_item.*, category.category_name',
    'order_by' => 'id',
    'join' => 'join category on orders_item.category_id = category.id',
    'where' => 'orders_id = ' . $id_order,
  );
  return get_all('orders_item', $options);
}
$list_orders_items = getListOrderItemById($id_order);

function getListRooms($id_category, $checkin, $checkout)
{
  $options = array(
    'order_by' => 'id',
    'where' => "category_id = $id_category AND NOT EXISTS (
            SELECT 1
            FROM checking_rooms c
            WHERE c.rooms_id = rooms.id
            AND (
                (c.checking_rooms_checkin <= '$checkin' AND c.checking_rooms_checkout >= '$checkin')
                OR (c.checking_rooms_checkin <= '$checkout' AND c.checking_rooms_checkout >= '$checkout')
                OR ('$checkin' <= c.checking_rooms_checkin AND '$checkout' >= c.checking_rooms_checkout)
            )
        )",
  );
  return get_all('rooms', $options);
}
function addCheckingRooms($orders_id, $rooms_id, $checking_rooms_checkin, $checking_rooms_checkout)
{
  $data = array(
    'orders_id' => $orders_id,
    'rooms_id' => $rooms_id,
    'checking_rooms_checkin' => $checking_rooms_checkin,
    'checking_rooms_checkout' => $checking_rooms_checkout,
    'created_date' => date('Y-m-d')
  );
  
  $result = save_and_get_result('checking_rooms', $data);
  return $result;
}

function handleSuccessOrder($id)
{
  $data = array(
    'orders_status' => 2,
    'update_date' => date('Y-m-d')
  );
  $where = "id = $id";
  return update_data('orders', $data, $where);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['confirm_booking'])) {
    $list_room = $_POST['list_room'];
    $finalArray = array();
    foreach ($list_room as $item) {
      $subArray = explode('|', $item);
      $resultArray = array(
        'rooms_id' => $subArray[0],
        'orders_id' => $subArray[1],
        'checking_rooms_checkin' => $subArray[2],
        'checking_rooms_checkout' => $subArray[3],
      );
      $finalArray[] = $resultArray;
    }
    for (
      $i = 0;
      $i < count($finalArray);
      $i++
    ) {
      $orders_id = $finalArray[$i]['orders_id'];
      $rooms_id = $finalArray[$i]['rooms_id'];
      $checking_rooms_checkin = $finalArray[$i]['checking_rooms_checkin'];
      $checking_rooms_checkout = $finalArray[$i]['checking_rooms_checkout'];
      $addCheckingRooms = addCheckingRooms($orders_id, $rooms_id, $checking_rooms_checkin, $checking_rooms_checkout);
      handleSuccessOrder($orders_id);
    }
    if ($addCheckingRooms) {
      echo "<script>window.top.location='list_booking.php'</script>";

    }
  }
}

?>
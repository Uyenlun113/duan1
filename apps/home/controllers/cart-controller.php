<?php
@include "../../configs/configs.php";
@include "../../configs/check-auth-home.php";
function getCart($dataLoginUser)
{
  $options = array(
    'select' => "cart_items.*, cart.*, category.*, category.id as category_id, cart.id as cart_id, cart_items.id as cart_items_id",
    'order_by' => 'cart_items.id ',
    'where' => 'users_id = ' . $dataLoginUser["id"],
    'join' => 'left join cart on cart.id = cart_items.cart_id join category on category.id = cart_items.category_id'
  );
  return get_all('cart_items', $options);
}
$list_cart_items = getCart($dataLoginUser);

$totalPrice = 0;
if (count($list_cart_items) > 0) {
  foreach ($list_cart_items as $item) {
    $totalPrice += $item['cart_item_price'] * $item['cart_item_quantity'];
  }
}

function deleteCartItem($id)
{
  $where = "id = $id";
  return delete_data('cart_items', $where);
}

function deleteCart($id)
{
  $where = "id = $id";
  return delete_data('cart', $where);
}

if (isset($_GET['delete_cart_item_id'])) {
  $idCartItem = $_GET['delete_cart_item_id'];
  $idCart = $_GET['delete_cart_id'];

  if (count($list_cart_items) > 1) {
    $deleteResult = deleteCartItem($idCartItem);
    if ($deleteResult) {
      header('Location: cart.php');
    }
  }
  else{
    $deleteResult = deleteCartItem($idCartItem);
    $deleteCartResult = deleteCart($idCart);
    if ($deleteResult && $deleteCartResult) {
      header('Location: cart.php');
    }
  }
}
?>
<?php
@include "../../configs/configs.php";
@include "../../configs/check-auth-home.php";
function getCart($dataLoginUser)
{
  $options = array(
    'order_by' => 'cart_items.id ',
    'where' => 'users_id = ' . $dataLoginUser["id"],
    'join' => 'join cart on cart.id = cart_items.cart_id join category on category.id = cart_items.category_id'
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

?>
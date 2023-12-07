<?php 
   @include "../../configs/configs.php";
   session_start();

    if(isset($_SESSION['login_home'])) {
        $userData = $_SESSION['login_home'];
    } 
    function getCart($userData) {
      $options = array(
        'order_by' => 'cart_items.id ',
        'where' => 'users_id = ' . $userData["id"],
        'join' => 'join cart on cart.id = cart_items.cart_id join category on category.id = cart_items.category_id'
      );
      return get_all('cart_items', $options);
    }
    $list_cart_items = getCart($userData);
?>
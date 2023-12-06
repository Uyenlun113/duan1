<?php 

   @include "../../configs/configs.php";
    if(isset($_SESSION['data_login'])) {
        $userData = $_SESSION['data_login'];
    } else {
        echo "<script>window.top.location='login.php'</script>";
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
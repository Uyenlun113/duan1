<?php 
   @include "../../configs/configs.php";
session_start();

if(isset($_SESSION['login_home'])) {
    $userData = $_SESSION['login_home'];
} else {
    echo "<script>window.top.location='login.php'</script>";
}

if (isset($_GET['booking'])) {
    $id_category = $_GET['booking'];
    $detail_category = get_a_data('category', $id_category);
}

function addCart($userData) {
    $data = array(
        'users_id' => $userData["id"],
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    return save_and_get_result('cart', $data);
}

function addBookingRoom($cart_id, $category_id, $cart_item_checkin, $cart_item_checkout, $cart_item_price,$cart_item_quantity, $cart_item_count_people, $cart_item_description) {
    $data = array(
        'cart_id' => $cart_id,
        'category_id' => $category_id,
        'cart_item_checkin' => $cart_item_checkin,
        'cart_item_checkout' => $cart_item_checkout,
        'cart_item_price' => $cart_item_price,
        'cart_item_quantity' => $cart_item_quantity,
        'cart_item_count_people' => $cart_item_count_people,
        'cart_item_description' => $cart_item_description,
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    $result = save_and_get_result('cart_items', $data);
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_to_cart"])) {
            $dataCart = addCart($userData);
            $category_id = $_POST["category_id"];
            $cart_item_checkin = $_POST["cart_item_checkin"];
            $cart_item_checkout = $_POST["cart_item_checkout"];
            $cart_item_price = $_POST["category_price"];
            $cart_item_quantity = $_POST["cart_item_quantity"];
            $cart_item_count_people = $_POST["cart_item_count_people"];
            $cart_item_description = $_POST["cart_item_description"];
            $dataCartItem = addBookingRoom($dataCart["id"], $category_id, $cart_item_checkin, $cart_item_checkout, $cart_item_price , $cart_item_quantity, $cart_item_count_people, $cart_item_description); 
            if ($dataCart && $dataCartItem) {
                echo "<script>window.top.location='cart.php'</script>";
            }
        } 
    }
?>
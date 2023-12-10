<?php
@include '../../configs/configs.php';
@include '../../configs/check-auth-home.php';

if (isset($_GET['booking'])) {
    $id_category = $_GET['booking'];
    $detail_category = get_a_data('category', $id_category);
}

function getCart($dataLoginUser)
{
    $options = array(
        'where' => 'users_id = ' . $dataLoginUser['id'],
    );
    return get_all('cart', $options);
}
$list_cart_items = getCart($dataLoginUser);

function getCartItemByCategoryId($categoryId, $cart_id)
{
    $options = array(
        'order_by' => 'cart_items.id ',
        'where' => "category_id = $categoryId and cart_id = $cart_id",
    );
    return get_all('cart_items', $options);
}

function addCart($dataLoginUser)
{
    $data = array(
        'users_id' => $dataLoginUser['id'],
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    return save_and_get_result('cart', $data);
}

function addBookingRoom($cart_id, $category_id, $cart_item_checkin, $cart_item_checkout, $cart_item_price, $cart_item_quantity, $cart_item_count_people, $cart_item_description)
{
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
    $cartItemByCategoryId = getCartItemByCategoryId($category_id, $cart_id);
    $dataUpdate = array(
        'cart_item_quantity' => $cartItemByCategoryId[0]['cart_item_quantity'] + $cart_item_quantity,
    );
    if (count($cartItemByCategoryId) > 0) {
        $where = 'id = ' . $cartItemByCategoryId[0]['id'];

        return update_data('cart_items', $dataUpdate, $where);
    } else {
        $result = save_and_get_result('cart_items', $data);
        return $result;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        if (count($list_cart_items) == 0) {
            $dataCart = addCart($dataLoginUser);
        }
        $category_id = $_POST['category_id'];
        $cart_item_checkin = $_POST['cart_item_checkin'];
        $cart_item_checkout = $_POST['cart_item_checkout'];
        $cart_item_price = $_POST['category_price'];
        $cart_item_quantity = $_POST['cart_item_quantity'];
        $cart_item_count_people = $_POST['cart_item_count_people'];
        $cart_item_description = $_POST['cart_item_description'];
        $cart_id = count($list_cart_items) == 0 ? $dataCart['id'] : $list_cart_items[0]['id'];
        $dataCartItem = addBookingRoom($cart_id, $category_id, $cart_item_checkin, $cart_item_checkout, $cart_item_price, $cart_item_quantity, $cart_item_count_people, $cart_item_description);
        if ($dataCartItem) {
            header('Location: cart.php');
        }
    }
}

function getListRoomsBlank($id_category)
{
    $options = array(
        'where' => "category_id = $id_category",
    );
    return get_all('rooms', $options);
}
$listRoomsBlank = getListRoomsBlank($id_category);


function getListRoomsNotBlank($cart_item_checkin, $cart_item_checkout)
{
    $options = array(
        'where' => " ('$cart_item_checkin' <=  checking_rooms_checkin and checking_rooms_checkin <= '$cart_item_checkout') or ('$cart_item_checkin' <=  checking_rooms_checkout  and checking_rooms_checkout  <= '$cart_item_checkout')",
    );
    return get_all('checking_rooms', $options);
}
function getCartItemByCategoryIdUsersID($categoryId, $cart_id)
{
    $options = array(
        'select' => 'cart_items.*',
        'order_by' => 'cart_items.id',
        'join' => "join cart on cart_items.cart_id = cart.id",
        'where' => "category_id = $categoryId and cart_id = $cart_id",

    );
    return get_all('cart_items', $options);
}

$totalRoomInCart = 0;
$totalRoomsBlank = -1;
if (count($list_cart_items) > 0) {
    $listCartItemByCategoryIdUsersID = getCartItemByCategoryIdUsersID($detail_category['id'], $list_cart_items[0]['id']);
    $totalRoomInCart = $listCartItemByCategoryIdUsersID[0]['cart_item_quantity'];
}

if (isset($_GET['cart_item_checkin']) && isset($_GET['cart_item_checkout'])) {
    $cart_item_checkin = $_GET['cart_item_checkin'];
    $cart_item_checkout = $_GET['cart_item_checkout'];
    $listRoomsNotBlank = getListRoomsNotBlank($cart_item_checkin, $cart_item_checkout, );
    $totalRoomsBlank = count($listRoomsBlank) - count($listRoomsNotBlank) - $totalRoomInCart;
}


?>
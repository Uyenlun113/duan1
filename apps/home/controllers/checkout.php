<?php
@include "../../configs/configs.php";
@include "../../configs/check-auth-home.php";

if (isset($_GET['order_code']) && is_numeric($_GET['order_code'])) {
    $orders_code_random = intval($_GET['order_code']);
} else {
    $orders_code_random = 0;
}
function getCart($dataLoginUser)
{
    $options = array(
        'select' => 'cart_items.*, category.id as category_id',
        'order_by' => 'cart_items.id ',
        'where' => 'users_id = ' . $dataLoginUser["id"],
        'join' => 'join cart on cart.id = cart_items.cart_id join category on category.id = cart_items.category_id'
    );
    return get_all('cart_items', $options);
}

$list_cart_items = getCart($dataLoginUser);
$totalAmount = 0;

foreach ($list_cart_items as $item) {
    $totalAmount += $item['cart_item_quantity'] * $item['cart_item_price'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["payUrl"])) {
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data)
                )
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $orders_code_random = isset($orders_code_random) ? $orders_code_random : '';
        $orderIDFake = rand(10000, 99999);
        if (!empty($_POST)) {
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $serectkey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderId = $orderIDFake;
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $totalAmount * 15 / 100;
            $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
            $redirectUrl = "http://localhost/duan1/apps/home/checkout.php?order_code=$orderIDFake";
            $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);
            header('Location: ' . $jsonResult['payUrl']);
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["vnpay"])) {
        $result = [];

        try {
            $key2 = "eG4r0GcoNtRGbO8";
            $postdata = file_get_contents('php://input');
            $postdatajson = json_decode($postdata, true);
            $mac = hash_hmac("sha256", $postdatajson["data"], $key2);

            $requestmac = $postdatajson["mac"];
            if (strcmp($mac, $requestmac) != 0) {
                $result["returncode"] = -1;
                $result["returnmessage"] = "mac not equal";
            } else {
                $datajson = json_decode($postdatajson["data"], true);
                $result["returncode"] = 1;
                $result["returnmessage"] = "success";
            }
        } catch (Exception $e) {
            $result["returncode"] = 0; // ZaloPay server sẽ callback lại (tối đa 3 lần)
            $result["returnmessage"] = $e->getMessage();
        }
    }
}

function addOrder($dataLoginUser, $orders_total, $orders_deposit, $orders_payment_method, $orders_code)
{
    $data = array(
        'users_id' => $dataLoginUser["id"],
        'orders_total' => $orders_total,
        'orders_deposit' => $orders_deposit,
        'orders_payment_method' => $orders_payment_method,
        'orders_status' => 1,
        'orders_code' => $orders_code,
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    return save_and_get_result('orders', $data);
}

function addOrderItems($orders_id, $category_id, $orders_item_checkin, $orders_item_checkout, $orders_item_price, $orders_item_quantity, $orders_item_count_people, $create_date, $update_date)
{
    $data = array(
        'orders_id' => $orders_id,
        'category_id' => $category_id,
        'orders_item_checkin' => $orders_item_checkin,
        'orders_item_checkout' => $orders_item_checkout,
        'orders_item_price' => $orders_item_price,
        'orders_item_quantity' => $orders_item_quantity,
        'orders_item_count_people' => $orders_item_count_people,
        'create_date' => $create_date,
        'update_date' => $update_date
    );
    return save_and_get_result('orders_item', $data);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["checkout"])) {
        $orders_payment_method = $_POST["orders_payment_method"];
        $orders_code = $_POST["orders_code_random"] > 0 ? $_POST["orders_code_random"] :  rand(10000,99999);
        $dataOrders = addOrder($dataLoginUser, $totalAmount, ($totalAmount / 100 * 15), $orders_payment_method, $orders_code);
        $where_cart = 'users_id = ' . $dataLoginUser["id"];
        delete_data('cart', $where_cart);
        for ($i = 0; $i < count($list_cart_items); $i++) {
            $orders_id = $dataOrders["id"];
            $category_id = $list_cart_items[$i]['category_id'];
            $orders_item_checkin = $list_cart_items[$i]['cart_item_checkin'];
            $orders_item_checkout = $list_cart_items[$i]['cart_item_checkout'];
            $orders_item_price = $list_cart_items[$i]['cart_item_price'];
            $orders_item_quantity = $list_cart_items[$i]['cart_item_quantity'];
            $orders_item_count_people = $list_cart_items[$i]['cart_item_count_people'];
            $create_date = date('Y-m-d');
            $create_date = date('Y-m-d');
            $addOrdersItems = addOrderItems($orders_id, $category_id, $orders_item_checkin, $orders_item_checkout, $orders_item_price, $orders_item_quantity, $orders_item_count_people, $create_date, $create_date);
            $where_cart_items = 'id = ' . $list_cart_items[$i]['id'];
            delete_data('cart_items', $where_cart_items);
        }
        if ($dataOrders && $addOrdersItems) {
            header('Location: checkout-success.php');
        }
    }
}


?>
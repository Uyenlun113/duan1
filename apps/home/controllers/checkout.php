<?php
@include "../../configs/configs.php";
@include "../../configs/check-auth-home.php";

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
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["momo"])) {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "Thông tin chuyển khoản: Số tài khoản XXX-XXX-XXXX, Ngân hàng ABC, Chi nhánh XYZ";

        $requestId = time() . "";
        $requestType = "captureWallet";
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "test",
            'storeId' => "MomoTestStore",
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

        if (!empty($_POST)) {
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);
            header('Location: ' . $jsonResult['payUrl']);
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["vnpay"])) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "CGXZLS0Z"; //Mã website tại VNPAY 
        $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Chuỗi bí mật
        $newVnp_TxnRef = rand(00, 9999);
        $vnp_OrderInfo = "day la noi dung thanh toán";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = 10000 * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $newVnp_TxnRef,
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        if (isset($vnp_HashSecret)) {
            $vnp_Url = $vnp_Url . "?" . $query;
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
        );

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
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
    if (isset($_POST["checkout"])) {
        $orders_payment_method = $_POST["orders_payment_method"];
        $orders_code = rand(00, 999999);
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
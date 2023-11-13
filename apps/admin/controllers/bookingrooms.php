<?php
    include_once "../../../../configs/configs.php";
    //list danh sách
function getAllBooking() {
        $options = array('order_by' => 'id');
        return get_all('bookings', $options);
    }
    $list_booking = getAllBooking();
    
//     function getAllBooking() {
//     $conn = pdo_get_connection();
//     $sql = "SELECT bookings.*, accounts.name as hihi
//           FROM bookings
//           LEFT JOIN accounts ON bookings.name_account = accounts.id";

//     $stmt = $conn->query($sql);
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

// $list_booking = getAllBooking();


   function addBooking($id_account, $id_room, $name_account, $CCCD, $tel, $address, $checkin, $check_out, $total_price, $payment, $status) {
    // Lấy id_account từ bảng khách hàng dựa trên tên
    $data = array(
        'id_account' => $id_account,
        'id_room' => $id_room,
        'name_account' => $name_account,
        'CCCD' => $CCCD,
        'tel' => $tel,
        'address' => $address,
        'checkin' => $checkin,
        'check_out' => $check_out,
        'create_date' => date('Y-m-d'),
        'total_price' => $total_price,
        'payment' => $payment,
        'status' => $status,
    );
    // Thêm đặt phòng
    return save_and_get_result('bookings', $data);
}

function getIdAccountByCustomerName($customer_name) {
    $query = "SELECT id_account FROM accounts WHERE name = :customer_name";

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':customer_name', $customer_name, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['id_account'] : null;
    } catch (PDOException $e) {
        // Log or handle the error appropriately
        echo "Error: " . $e->getMessage();
        return null;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["add_booking"])) {
        $name_account = isset($_POST["name_account"]) ? $_POST["name_account"] : "";
        $id_room = isset($_POST["id_room"]) ? $_POST["id_room"] : "";
        $checkin = isset($_POST["checkin"]) ? $_POST["checkin"] : "";
        $checkout = isset($_POST["checkout"]) ? $_POST["checkout"] : "";
        $total_price = isset($_POST["total_price"]) ? $_POST["total_price"] : "";
        $payment = isset($_POST["payment"]) ? $_POST["payment"] : "";
        $status = isset($_POST["status"]) ? $_POST["status"] : "";

        $addResult = addBooking("$id_account", $id_room, $name_account, $CCCD, $tel, $address, $checkin, $check_out, $total_price, $payment, $status);
        if ($addResult) {
            // Xử lý thành công
        } else {
            // Xử lý lỗi
            echo "Error adding booking!";
        }
    }
}




?>
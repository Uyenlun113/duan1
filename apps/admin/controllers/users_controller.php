<?php
    include_once "../../../../configs/configs.php";
    function getListStaff() {
        $options = array(
            'select' => 'users.*',
            'order_by' => 'users.id',
            'where' => 'users.users_type = 1'
        );
        return get_all('users', $options);
    }

    function getListCustomer() {
        $options = array(
            'select' => 'users.*',
            'order_by' => 'users.id',
            'where' => 'users.users_type = 2'
        );
        return get_all('users', $options);
    }
    
    
        $list_staff = getListStaff();
        $list_customer = getListCustomer();

    
    function handleCreateStaff($users_code, $users_name, $users_avatar, $users_email, $users_account, $users_password, $users_CCCD, $users_phone_number, $users_birthday, $users_address) {
    $data = array(
        'users_code' => $users_code,
        'users_name' => $users_name,
        'users_avatar' => $users_avatar,
        'users_email' => $users_email,
        'users_account' => $users_account,
        'users_password' => $users_password,
        // 'users_position' => $users_position,
        'users_CCCD' => $users_CCCD,
        'users_phone_number' => $users_phone_number,
        'users_birthday' => $users_birthday,
        'users_address' => $users_address,
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    return save_and_get_result('users', $data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create_staff"])) {
        $users_code = $_POST["users_code"];
        $users_name = $_POST["users_name"]; 
        $users_email = $_POST["users_email"];
        $users_account = $_POST["users_account"];
        $users_password = $_POST["users_password"];
        $users_CCCD = $_POST["users_CCCD"];
        $users_phone_number = $_POST["users_phone_number"];
        $users_birthday = $_POST["users_birthday"];
        $users_address = $_POST["users_address"];

        if ($_FILES['users_avatar']['error'] === UPLOAD_ERR_OK) {
            $users_avatar = "users/" . $_FILES['users_avatar']['name'];  // Assign the correct value to $users_avatar
            $temp_path = $_FILES['users_avatar']['tmp_name'];
            move_uploaded_file($temp_path, $users_avatar);

            $addResult = handleCreateStaff($users_code, $users_name, $users_avatar, $users_email, $users_account, $users_password, $users_CCCD, $users_phone_number, $users_birthday, $users_address);

            if ($addResult) {
                echo "<script>window.top.location='list_staff.php'</script>";
            } else {
                echo "Chưa thêm được nhân viên. $addResult";
            }
        } else {
            echo "Lỗi tải lên hình ảnh: " . $_FILES['users_avatar']['error'];
        }
    } 
}



 // lấy ra thông tin sản phẩm vào form sửa
if (isset($_GET['update_staff'])) {
    $id = intval($_GET['update_staff']);
    $detail_staff = get_a_data('users', $id);
}

function updaterooms($id, $category_id, $room_code,$room_name, $room_image, $room_price, $room_max_people, $room_sales_price, $room_description, $room_status)
{
        $detail_rooms = get_a_data('rooms', $id);

    $data = array(
         'category_id' => (int)$category_id,
            'room_code' => $room_code,
            'room_name' => $room_name,
            'room_image' =>  $room_image == "rooms/" ? $detail_rooms["room_image"]  : $room_image,
            'room_price' => (int)$room_price,
            'room_max_people' => (int)$room_max_people,
            'room_sales_price' => (int)$room_sales_price,
            'room_description' => $room_description,
            'room_status' =>  (int)$room_status,
            'update_date' => date('Y-m-d')
    );

    $where = "id = $id";
return update_data('rooms', $data, $where);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update_rooms"])) {
        $id = $_POST["id"];
        $category_id = $_POST["category_id"];
          $room_code = $_POST["room_code"];
        $room_name = $_POST["room_name"];
        $room_price = $_POST["room_price"];
        $room_max_people = $_POST["room_max_people"];
        $room_sales_price = $_POST["room_sales_price"];
        $room_description = $_POST["room_description"];
        $room_status = $_POST["room_status"];
        $room_image =  (isset($_FILES['room_image']['name'])) ? "rooms/".$_FILES['room_image']['name'] :[];
        $target_dir = "../../upload/rooms/";
        $targetFile = $target_dir . basename($_FILES["room_image"]["name"]);
        $updateResult = updaterooms($id, $category_id, $room_code,$room_name, $room_image, $room_price, $room_max_people, $room_sales_price, $room_description, $room_status);
        if ($updateResult) {
            echo "<script>window.top.location='list_rooms.php'</script>";
            echo "Cập nhật thành công!";
        } else {
            echo "Chưa cập nhật được loại phòng. $updateResult";
        }
    }
}


function deleteCustomer($id) {
$where = "id = $id";
return delete_data('users', $where);
}

//Xóa data
if (isset($_GET["delete_customer_id"])){
$id = $_GET["delete_customer_id"];
$deleteResult = deleteCustomer($id);
if ($deleteResult) {
                echo "<script>window.top.location='list_customer.php'</script>";

echo "Xóa thành công!";
} else {

}
}
if (isset($_GET["delete_staff_id"])){
$id = $_GET["delete_staff_id"];
$deleteResult = deleteCustomer($id);
if ($deleteResult) {
                echo "<script>window.top.location='list_staff.php'</script>";

echo "Xóa thành công!";
} else {

}
}
?>
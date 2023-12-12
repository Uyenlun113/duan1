<?php
@include "../../configs/configs.php";
session_start();

function handleRegister($users_avatar, $users_name, $users_CCCD, $users_address, $users_birthday, $users_phone_number, $users_email, $users_account, $users_password)
{
  $data = array(
    'users_code' => rand(000000, 99999999),
    'users_avatar' => $users_avatar,
    'users_name' => $users_name,
    'users_CCCD' => $users_CCCD,
    'users_address' => $users_address,
    'users_birthday' => $users_birthday,
    'users_position' => 2,
    'users_phone_number' => $users_phone_number,
    'users_email' => $users_email,
    'users_account' => $users_account,
    'users_password' => $users_password,
    'users_type' => 2,
    'create_date' => date('Y-m-d'),
    'update_date' => date('Y-m-d')
  );
  return save_and_get_result('users', $data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["register"])) {
    $users_name = $_POST["users_name"];
    $users_CCCD = $_POST["users_CCCD"];
    $users_address = $_POST["users_address"];
    $users_birthday = $_POST["users_birthday"];
    $users_phone_number = $_POST["users_phone_number"];
    $users_email = $_POST["users_account"];
    $users_account = $_POST["users_account"];
    $users_password = $_POST["users_password"];
    if ($_FILES['users_avatar']['error'] === UPLOAD_ERR_OK) {
      $users_avatar = "users/" . $_FILES['users_avatar']['name'];
      $temp_path = $_FILES['users_avatar']['tmp_name'];
      move_uploaded_file($temp_path, $users_avatar);
      $register = handleRegister($users_avatar, $users_name, $users_CCCD, $users_address, $users_birthday, $users_phone_number, $users_email, $users_account, $users_password);
      if ($register) {
        header('Location: login.php');

      } else {
        echo "Đăng kí thất bại";
      }
    } else {
      echo "Lỗi tải lên hình ảnh: " . $_FILES['room_image']['error'];
    }
  }
}
?>
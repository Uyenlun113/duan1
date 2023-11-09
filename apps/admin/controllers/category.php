<?php
include_once "../../../../configs/configs.php";
function getAllCategories() {
    $options = array('order_by' => 'id');
    return get_all('category', $options);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    $data = array(
        'code' => $code,
        'name' => $name,
        'description' => $description,
        'status' => $status,
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    // Add new category
    $result = save_and_get_result('category', $data);
    if ($result) {
        echo "Thêm mới thành công!";
    } else {
        echo "chưa thêm được loại phòng";
    }
}

$list_categories = getAllCategories();
?>
<?php
include_once "../../../../configs/configs.php";
include_once "../../../../configs/check-auth-admin.php";

function getAllService($search_service)
{
   $options = array('order_by' => 'id');
    if (!empty($search_service)) {
        $options['where'] = "service.service_name LIKE '%$search_service%'";
    }
    return get_all('service', $options);
}
$searchValue = isset($_GET['search_service']) ? htmlspecialchars($_GET['search_service']) : '';
$list_service = getAllService($searchValue);


function addService($service_name, $service_icon, $service_description)
{
    $data = array(
        'service_name' => $service_name,
        'service_icon' => $service_icon,
        'service_description' => $service_description,

    );
    return save_and_get_result('service', $data);
}



function updateService($id, $service_name, $service_icon, $service_description)
{
    $data = array(
        'service_name' => $service_name,
        'service_icon' => $service_icon,
        'service_description' => $service_description,
    );
    $where = "id = $id";
    return update_data('service', $data, $where);
}

function deleteService($id)
{
    $where = "id = $id";
    return delete_data('service', $where);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_service"])) {
        $service_name = $_POST['service_name'];
        $service_icon = $_POST['service_icon'];
        $service_description = $_POST['service_description'];

        $addResult = addService($service_name, $service_icon, $service_description);
        if ($addResult) {
            echo "<script>window.top.location='list_service.php'</script>";
        } else {
            echo "Chưa thêm được loại phòng. $addResult";
        }
    }
}

// lấy ra thông tin sản phẩm vào form sửa
if (intval($_GET['update_service'])) {
    $subRoomId = intval($_GET['update_service']);
    return $detailService = get_a_data('service', $subRoomId);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update_service"])) {
        $id = $_POST['id'];
        $service_name = $_POST['service_name'];
        $service_icon = $_POST['service_icon'];
        $service_description = $_POST['service_description'];
        $updateResult = updateService($id, $service_name, $service_icon, $service_description);

        if ($updateResult) {
            echo "<script>window.top.location='list_service.php'</script>";
        } else {
            echo "Chưa cập nhật được loại phòng. $updateResult";
        }
    }
}


//Xóa data
if (isset($_GET["delete_service_id"])) {
    $id = $_GET["delete_service_id"];
    $deleteResult = deleteService($id);
    if ($deleteResult) {
        echo "<script>window.top.location='list_service.php'</script>";

    } else {
        echo "Chưa xóa được loại phòng. $deleteResult";
    }
}
?>
<?php
include_once "../../../../configs/configs.php";
include_once "../../../../configs/check-auth-admin.php";

//list danh sách

function getListCategory($search_category)
{
    $options = array('order_by' => 'id');
    if (!empty($search_category)) {
        $options['where'] = "category.category_name LIKE '%$search_category%' OR category.category_code LIKE '%$search_category%'";
    }
    return get_all('category', $options);
}
$searchValue = isset($_GET['search_category']) ? htmlspecialchars($_GET['search_category']) : '';
$list_categories = getListCategory($searchValue);

function getListService()
{
    $options = array('order_by' => 'id');
    return get_all('service', $options);
}
$list_service = getListService();



function addCategory($category_code, $category_name, $category_image, $category_price, $category_adult, $category_description, $category_status)
{
    $data = array(
        'category_code' => $category_code,
        'category_name' => $category_name,
        'category_image' => $category_image,
        'category_price' => $category_price,
        'category_adult' => $category_adult,
        'category_description' => $category_description,
        'category_status' => $category_status,
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    return save_and_get_result('category', $data);
}

function updateCategory($id, $category_code, $category_name, $category_image, $category_price, $category_adult, $category_description, $category_status)
{
    $detailCategory = get_a_data('category', $id);
    $data = array(
        'category_code' => $category_code,
        'category_name' => $category_name,
        'category_image' => $category_image == "category/" ? $detailCategory["category_image"] : $category_image,
        'category_price' => $category_price,
        'category_adult' => $category_adult,
        'category_description' => $category_description,
        'category_status' => $category_status,
        'update_date' => date('Y-m-d')
    );
    $where = "id = $id";
    return update_data('category', $data, $where);
}

function deleteCategory($id)
{
    $where = "id = $id";
    return delete_data('category', $where);
}

function handleAddSericeCategory($category_id, $service_id)
{
    $data = array(
        'category_id' => $category_id,
        'service_id' => $service_id,
        'create_date' => date('Y-m-d')
    );
    return save_and_get_result('category_service', $data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create_category"])) {
        $category_code = $_POST["category_code"];
        $category_name = $_POST["category_name"];
        $category_price = $_POST["category_price"];
        $category_adult = $_POST["category_adult"];
        $category_description = $_POST["category_description"];
        $category_status = $_POST["category_status"];
        if ($_FILES['category_image']['error'] === UPLOAD_ERR_OK) {
            $category_image = "category/" . $_FILES['category_image']['name'];
            $temp_path = $_FILES['category_image']['tmp_name'];
            move_uploaded_file($temp_path, $category_image);
            $addResult = addCategory($category_code, $category_name, $category_image, $category_price, $category_adult, $category_description, $category_status);
            if (isset($_POST['list_service_add']) && is_array($_POST['list_service_add'])) {
                $selectedService = $_POST['list_service_add'];
                foreach ($selectedService as $service) {
                    handleAddSericeCategory($addResult['id'], $service);
                }
            }
            if ($addResult) {
                header('Location: list_category.php');
            } else {
                echo "Chưa thêm được loại phòng. $addResult";
            }
        } else {
            echo "Lỗi tải lên hình ảnh: " . $_FILES['category_image']['error'];
        }
    }
}

// lấy ra thông tin sản phẩm vào form sửa
if (isset($_GET['update_category'])) {
    $subCateId = intval($_GET['update_category']);
    $detailCategory = get_a_data('category', $subCateId);
}

function getListDetailCategory( $detailCategory ) {
    $options = array(
        'select' => 'category_service.*',
        'where' => 'category_id ='. $detailCategory['id'],
    );
    return get_all( 'category_service', $options );

}
$list_detail_category = getListDetailCategory( $detailCategory );

// Xử lý cập nhật dịch vụ
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_category"])) {
    $id = $_POST["id"];
    $category_code = $_POST["category_code"];
    $category_name = $_POST["category_name"];
    $category_price = $_POST["category_price"];
    $category_adult = $_POST["category_adult"];
    $category_description = $_POST["category_description"];
    $category_status = $_POST["category_status"];
    $category_image = (isset($_FILES['category_image']['name'])) ? "category/" . $_FILES['category_image']['name'] : '';

    $target_dir = "../../upload/category/";
    $targetFile = $target_dir . basename($_FILES["category_image"]["name"]);
    $updateResult = updateCategory($id, $category_code, $category_name, $category_image, $category_price, $category_adult, $category_description, $category_status);

    if ($updateResult) {
        // Xóa các dịch vụ đã liên kết với danh mục
        delete_data('category_service', "category_id = $id");

        // Thêm lại các dịch vụ mới đã chọn
        if (isset($_POST['list_service_add']) && is_array($_POST['list_service_add'])) {
            $selectedService = $_POST['list_service_add'];
            foreach ($selectedService as $service) {
                handleAddSericeCategory($id, $service);
            }
        }

        echo "<script>window.top.location='list_category.php'</script>";
    } else {
        echo "Cập nhật không thành công!";
    }
}


if (isset($_GET["delete_category_id"])) {
    $id = $_GET["delete_category_id"];
    $deleteResult = deleteCategory($id);
    if ($deleteResult) {
        echo "<script>window.top.location='list_category.php'</script>";
    } else {
    }
}


?>
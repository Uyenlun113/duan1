<?php
    include_once "../../../../configs/configs.php";
    //list danh sách
    function getAllCategories() {
        $options = array('order_by' => 'id');
        return get_all('category', $options);
    }
    $list_categories = getAllCategories();
    function addCategory($code, $name, $description, $status) {
        $data = array(
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'status' => $status,
            'create_date' => date('Y-m-d'),
            'update_date' => date('Y-m-d')
        );
        return save_and_get_result('category', $data);
    }



    function updateCategory($id, $code, $name, $description, $status) {
        $data = array(
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'status' => $status,
            'update_date' => date('Y-m-d')
        );
        $where = "id = $id";
        return update_data('category', $data, $where);
    }

    function deleteCategory($id) {
        $where = "id = $id";
        return delete_data('category', $where);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_category"])) {
            $code = $_POST["code"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $status = $_POST["status"];
            $addResult = addCategory($code, $name, $description, $status);
            if ($addResult) {
                header('location:category.php?controller=category');
            } else {
            }
        } 
    }

    // lấy ra thông tin sản phẩm vào form sửa
    if (intval($_GET['update_category'])) {
        $subCateId = intval($_GET['update_category']);
        return $detailCategory = get_a_data('category', $subCateId);
    }   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["update_category"])) {
            $id = $_POST["id"];
            $code = $_POST["code"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $status = $_POST["status"];
            $updateResult = updateCategory($id, $code, $name, $description, $status);
            if ($updateResult) {
                header('location:category.php?controller=category');
            } else {
            }
        }  
    }
    
    //Xóa data
    if (isset($_GET["delete_category_id"])) {
        $id = $_GET["delete_category_id"];
        $deleteResult = deleteCategory($id);
        if ($deleteResult) {
            header('location:category.php?controller=category');
        } else {
        }
    }
?>
<?php
    include_once "../../../../configs/configs.php";
    //list danh sách

    session_start();
    if (!isset($_SESSION['data_login'])) {
    echo "<script>window.top.location='../auth/login.php'</script>";
    }
    
    function getListRoles() {
        $options = array('order_by' => 'id');
        return get_all('roles', $options);
    }
    $list_roles = getListRoles();
    
    function addCategory($category_code, $category_name, $category_description, $category_status) {
        $data = array(
            'category_code' => $category_code,
            'category_name' => $category_name,
            'category_description' => $category_description,
            'category_status' => $category_status,
            'create_date' => date('Y-m-d'),
            'update_date' => date('Y-m-d')
        );
        return save_and_get_result('category', $data);
    }

    function updateCategory($id, $category_code, $category_name, $category_description, $category_status) {
        $data = array(
            'category_code' => $category_code,
            'category_name' => $category_name,
            'category_description' => $category_description,
            'category_status' => $category_status,
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
        if (isset($_POST["create_category"])) {
            $category_code = $_POST["category_code"];
            $category_name = $_POST["category_name"];
            $category_description = $_POST["category_description"];
            $category_status = $_POST["category_status"];
            $addResult = addCategory($category_code, $category_name, $category_description, $category_status);
            if ($addResult) {
                            echo "<script>window.top.location='list_category.php'</script>";
            } else {
            }
        } 
    }

    // lấy ra thông tin sản phẩm vào form sửa
    if (isset($_GET['update_category'])) {
        $subCateId = intval($_GET['update_category']);
        return $detailCategory = get_a_data('category', $subCateId);
    }   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["update_category"])) {
            $id = $_POST["id"];
            $category_code = $_POST["category_code"];
            $category_name = $_POST["category_name"];
            $category_description = $_POST["category_description"];
            $category_status = $_POST["category_status"];
            $updateResult = updateCategory($id, $category_code, $category_name, $category_description, $category_status);
            if ($updateResult) {
                echo "<script>window.top.location='list_category.php'</script>";
            } else {
            }
        }  
    }
    //Xóa data
    if (isset($_GET["delete_category_id"])) {
        $id = $_GET["delete_category_id"];
        $deleteResult = deleteCategory($id);
        if ($deleteResult) {
                            echo "<script>window.top.location='list_category.php'</script>";
        } else {
        }
    }
?>
<?php
    include_once "../../../../configs/configs.php";
    function getAllrooms() {
        $options = array('order_by' => 'id');
        return get_all('rooms', $options);
    }
    $list_rooms = getAllrooms();
    function addrooms($code, $name, $description, $status) {
        $data = array(
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'status' => $status,
            'create_date' => date('Y-m-d'),
            'update_date' => date('Y-m-d')
        );
        return save_and_get_result('rooms', $data);
    }



    function updaterooms($id, $code, $name, $description, $status) {
        $data = array(
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'status' => $status,
            'update_date' => date('Y-m-d')
        );
        $where = "id = $id";
        return update_data('rooms', $data, $where);
    }

    function deleterooms($id) {
        $where = "id = $id";
        return delete_data('rooms', $where);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_rooms"])) {
            $code = $_POST["code"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $status = $_POST["status"];
            $addResult = addrooms($code, $name, $description, $status);
            if ($addResult) {
                header('location:rooms.php?controller=rooms');
                echo "Thêm mới thành công!";
            } else {
                echo "Chưa thêm được loại phòng. $addResult";
            }
        } 
    }

    // lấy ra thông tin sản phẩm vào form sửa
    if (intval($_GET['update_rooms'])) {
        $subCateId = intval($_GET['update_rooms']);
        return $detailrooms = get_a_data('rooms', $subCateId);
    }
            
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["update_rooms"])) {
            $id = $_POST["id"];
            $code = $_POST["code"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $status = $_POST["status"];
            $updateResult = updaterooms($id, $code, $name, $description, $status);
            if ($updateResult) {
                header('location:rooms.php?controller=rooms');
                echo "Cập nhật thành công!";
            } else {
                echo "Chưa cập nhật được loại phòng. $updateResult";
            }
        }  
    }
    

    //Xóa data
    if (isset($_GET["delete_rooms_id"])) {
        $id = $_GET["delete_rooms_id"];
        $deleteResult = deleterooms($id);
        if ($deleteResult) {
            header('location:rooms.php?controller=rooms');
            echo "Xóa thành công!";
        } else {
            echo "Chưa xóa được loại phòng. $deleteResult";
        }
    }
?>
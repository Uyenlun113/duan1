<?php
    include_once "../../../../configs/configs.php";
    function getAllrooms() {
        $options = array('order_by' => 'id');
        return get_all('rooms', $options);
    }
    $list_rooms = getAllrooms();
    function addrooms($id_category, $name, $img, $price, $number_adult, $number_children, $id_service, $description, $status) {
        $data = array(
            'id_category' => $id_category,
            'name' => $name,
            'img' => $img,
            'price' => $price,
            'number_adult' => $number_adult,
            'number_children' => $number_children,
            'id_service' => $id_service,
            'description' => $description,
            'status' => $status,
            'create_date' => date('Y-m-d'),
            'update_date' => date('Y-m-d')
        );
        return save_and_get_result('rooms', $data);
    }



    function updaterooms($id_category, $name, $img, $price, $number_adult, $number_children, $id_service, $description, $status) {
        $data = array(
            'id_category' => $id_category,
            'name' => $name,
            'img' => $img,
            'price' => $price,
            'number_adult' => $number_adult,
            'number_children' => $number_children,
            'id_service' => $id_service,
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
            $id_category = $_POST["id_category"];
            $name = $_POST["name"];
            $img = $_POST["img"];
            $price = $_POST["price"];
            $number_adult = $_POST["number_adult"];
            $number_children = $_POST["number_children"];
            $id_service = $_POST["id_service"];
            $description = $_POST["description"];
            $status = $_POST["status"];
            $addResult = addrooms($id_category, $name, $img, $price, $number_adult, $number_children, $id_service, $description, $status);
            if ($addResult) {
                header('location:listrooms.php?controller=rooms');
                echo "Thêm mới thành công!";
            } else {
                echo "Chưa thêm được loại phòng. $addResult";
            }
        } 
    }

    // lấy ra thông tin sản phẩm vào form sửa
    if (intval($_GET['update_rooms'])) {
        $subRoomsId = intval($_GET['update_rooms']);
        return $detailrooms = get_a_data('rooms', $subRoomsId);
    }
            
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["update_rooms"])) {
        $id_category = $_POST["id_category"];
        $name = $_POST["name"];
        $img = $_POST["img"];
        $price = $_POST["price"];
        $number_adult = $_POST["number_adult"];
        $number_children = $_POST["number_children"];
        $id_service = $_POST["id_service"];
        $description = $_POST["description"];
        $status = $_POST["status"];
            $updateResult = updaterooms($id_category, $name, $img, $price, $number_adult, $number_children, $id_service, $description, $status);
            if ($updateResult) {
                header('location:listrooms.php?controller=rooms');
                echo "Cập nhật thành công!";
            } else {
                echo "Chưa cập nhật được loại phòng. $updateResult";
            }
        }  
    }
    

    //Xóa data
    if (isset($_GET["delete_rooms_id"])){
        $id = $_GET["delete_rooms_id"];
        $deleteResult = deleterooms($id);
        if ($deleteResult) {
            header('location:listrooms.php?controller=rooms');
            echo "Xóa thành công!";
        } else {
            echo "Chưa xóa được loại phòng. $deleteResult";
        }
    }
?>
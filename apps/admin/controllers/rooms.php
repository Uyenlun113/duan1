<?php
    include_once "../../../../configs/configs.php";
    function getAllrooms() {
    $options = array(
        'select' => 'rooms.*, category.name as name_category, room_service.name as name_service',
        'order_by' => 'rooms.id',
        'join' => 'JOIN category ON rooms.id_category = category.id JOIN room_service ON rooms.id_service = room_service.id'
    );
    return get_all('rooms', $options);
}

    $list_rooms = getAllrooms();
    function getAllCategories() {
        $options = array('order_by' => 'id');
        return get_all('category', $options);
    }
    $list_categories = getAllCategories();
    function getAllService() {
        $options = array(
            'order_by' => 'id',
            'where' => 'status = 1'
    );
        return get_all('room_service', $options);
    }
    $allServices = getAllService();
function addrooms($id_category, $name, $img, $price, $number_adult, $number_children, $id_services, $description, $status) {
    $data = array(
        'id_category' => $id_category,
        'name' => $name,
        'img' => $img,
        'price' => $price,
        'number_adult' => $number_adult,
        'number_children' => $number_children,
        'id_service' => implode(',', $id_services), // Ensure correct handling of multiple services
        'description' => $description,
        'status' => $status,
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    return save_and_get_result('rooms', $data);
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_rooms"])) {
            $id_category = $_POST["id"];
            $name = $_POST["name"];
            $price = $_POST["price"];
            $number_adult = $_POST["number_adult"];
            $number_children = $_POST["number_children"];
            $description = $_POST["description"];
            $status = $_POST["status"];
            $img = "rooms/".$_FILES['img']['name'];
            $target_dir = "../../upload/rooms/";
            if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
}
            $target_file = $target_dir . basename($_FILES['img']['name']);

                if (move_uploaded_file($_FILES["img"]['tmp_name'], $target_file)) {
                } else {
                }
            $selectedServices = isset($_POST["id_service"]) ? $_POST["id_service"] : [];
            $addResult = addrooms($id_category, $name, $img, $price, $number_adult, $number_children, $selectedServices, $description, $status);

            if ($addResult) {
                //header('location:listrooms.php?controller=rooms');
                echo "Thêm mới thành công!";
            } else {
                echo "Chưa thêm được loại phòng. $addResult";
            }
        } 
    }



    function updaterooms($id,$id_category, $name, $img, $price, $number_adult, $number_children, $id_service, $description, $status) {
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

    
    // lấy ra thông tin sản phẩm vào form sửa
    // if (intval($_GET['update_rooms'])) {
    //     $subRoomsId = intval($_GET['update_rooms']);
    //     return $detailrooms = get_a_data('rooms', $subRoomsId);
    // }
            
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //    if (isset($_POST["update_rooms"])) {
    //     $id_category = $_POST["id_category"];
    //     $name = $_POST["name"];
    //     $img = $_POST["img"];
    //     $price = $_POST["price"];
    //     $number_adult = $_POST["number_adult"];
    //     $number_children = $_POST["number_children"];
    //     $id_service = $_POST["id_service"];
    //     $description = $_POST["description"];
    //     $status = $_POST["status"];
    //         $updateResult = updaterooms($id,$id_category, $name, $img, $price, $number_adult, $number_children, $id_service, $description, $status);
    //         if ($updateResult) {
    //             header('location:listrooms.php?controller=rooms');
    //             echo "Cập nhật thành công!";
    //         } else {
    //             echo "Chưa cập nhật được loại phòng. $updateResult";
    //         }
    //     }  
    // }    
    

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
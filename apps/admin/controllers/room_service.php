<?php
    include_once "../../../../configs/configs.php";
    function getAllService() {
        $options = array('order_by' => 'id');
        return get_all('room_service', $options);
    }
    $list_service = getAllService();

    function addService($name, $description, $price,$status) {
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'status' => $status
            
        );
        return save_and_get_result('room_service', $data);
    }



    function updateService($id, $name, $description, $price, $status) {
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'status' => $status
        );
        $where = "id = $id";
        return update_data('room_service', $data, $where);
    }
    
    function deleteService($id) {
        $where = "id = $id";
        return delete_data('room_service', $where);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_service"])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            $addResult = addService($name, $description, $price,$status);
            if ($addResult) {
                header('location:listservice.php?controller=room_service');
                echo "Thêm mới thành công!";
            } else {
                echo "Chưa thêm được loại phòng. $addResult";
            }
        } 
    }

    // lấy ra thông tin sản phẩm vào form sửa
    if (intval($_GET['update_service'])) {
        $subRoomId = intval($_GET['update_service']);
        return $detailService = get_a_data('room_service', $subRoomId);
    }
            
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update_service"])) {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $status = $_POST['status'];
      $updateResult = updateService($id, $name, $description, $price, $status);

      if ($updateResult) {
        header('location:listservice.php?controller=room_service');
        echo "Cập nhật thành công!";
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
            header('location:listservice.php?controller=room_service');
            echo "Xóa thành công!";
        } else {
            echo "Chưa xóa được loại phòng. $deleteResult";
        }
    }
?>
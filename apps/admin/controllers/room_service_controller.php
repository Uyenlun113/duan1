<?php
    include_once "../../../../configs/configs.php";
        include_once "../../../../configs/check-auth-admin.php";

    function getAllService() {
        $options = array('order_by' => 'id');
        return get_all('room_service', $options);
    }
    $list_service = getAllService();

    function addService($name_service,$description_service, $price_service,$status_service) {
        $data = array(
            'name_service' => $name_service,
            'description_service' => $description_service,
            'price_service' => $price_service,
            'status_service' => $status_service
        );
        return save_and_get_result('room_service', $data);
    }



    function updateService($id, $name_service, $description_service, $price_service, $status_service) {
        $data = array(
            'name_service' => $name_service,
            'description_service' => $description_service,
            'price_service' => $price_service,
            'status_service' => $status_service
        );
        $where = "id = $id";
        echo json_encode($data);
        return update_data('room_service', $data, $where);
    }
    
    function deleteService($id) {
        $where = "id = $id";
        return delete_data('room_service', $where);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_service"])){
            $name_service = $_POST['name_service'];
            $description_service = $_POST['description_service'];
            $price_service = $_POST['price_service'];
            $status_service = $_POST['status_service'];
            $addResult = addService($name_service, $description_service, $price_service,$status_service);
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
        return $detailService = get_a_data('room_service', $subRoomId);
    }
            
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update_service"])) {
      $id = $_POST['id'];
      $name_service = $_POST['name_service'];
      $description_service = $_POST['description_service'];
      $price_service = $_POST['price_service'];
      $status_service = $_POST['status_service'];
      $updateResult = updateService($id, $name_service, $description, $price_service, $status_service);

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
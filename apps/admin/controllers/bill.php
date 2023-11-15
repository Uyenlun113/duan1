<?php
    include_once "../../../../configs/configs.php";
    //list danh sách
    function getAllBill() {
        $options = array('order_by' => 'id');
        return get_all('bill', $options);
    }
    $list_Bill = getAllBill();


    function addBill($id_booking, $total_price, $status) {
        $data = array(
            'id_booking' => $id_booking,
            'total_price' => $total_price,
            'status' => $status,
        );
        return save_and_get_result('bill', $data);
    }



    function updateBill($id_booking, $total_price, $status) {
        $data = array(
            'id_booking' => $id_booking,
            'total_price' => $total_price,
            'status' => $status,
        );
        $where = "id = $id";
        return update_data('bill', $data, $where);
    }

    function deleteBill($id) {
        $where = "id = $id";
        return delete_data('bill', $where);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_bill"])) {
            $id_booking = $_POST["id_booking"];
            $total_price = $_POST["total_price"];
            $status = $_POST["status"];
            $addResult = addBill($id_booking, $total_price, $status);
            if ($addResult) {
                header('location:bill.php?controller=bill');
            } else {
            }
        } 
    }

    if (isset($_GET['update_bill']) && intval($_GET['update_bill'])) {
        $subBillId = intval($_GET['update_bill']);
        return $detailBill = get_a_data('bill', $subBillId);
    } 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_GET['update_bill']) && intval($_GET['update_bill'])) {
            $id = $_POST["id"];
            $id_booking = $_POST["id_booking"];
            $total_price = $_POST["total_price"];
            $status = $_POST["status"];
            $updateResult = updateBill($id, $id_booking, $total_price, $status);
            if ($updateResult) {
                header('location:bill.php?controller=bill');
            } else {
               
            }
            
        }  
    }
    
    //Xóa data
    if (isset($_GET["delete_bill_id"])) {
        $id = $_GET["delete_bill_id"];
        $deleteResult = deleteBill($id);
        if ($deleteResult) {
            header('location:bill.php?controller=bill');
        } else {
        }
    }
?>
<?php 

   @include "../../configs/configs.php";
   // lấy ra thông tin sản phẩm vào form sửa
    if (isset($_GET['room_details'])) {
        $roomsId = intval($_GET['room_details']);
        $roomsDetail = get_a_data('rooms', $roomsId);
    }
?>
<?php 
    @include "../../../../configs/configs.php";

    if (intval($_GET['detail_rooms'])) {
        $idRooms = intval($_GET['detail_rooms']);
        $detailrooms = get_a_data('rooms', $idRooms);
    }
?>
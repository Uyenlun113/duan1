<?php 

   @include "../../configs/configs.php";
    function getTop4PopularRooms() {
      $options = array(
        'order_by' => 'rooms.id',
        "limit" => 4,
        "offset" => 0,
      );
      return get_all('rooms', $options);
    }
    $list_rooms_popular = getTop4PopularRooms();

?>
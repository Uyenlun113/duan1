<?php 
    @include "../../../../configs/configs.php";
    function getPopularTop4() {
        $options = array(
          'order_by' => 'id',
          "offset" => "0",
          "limit" => "4"
        );
        return get_all('rooms', $options);
    }
    $list_rooms_popular_top_4 = getPopularTop4();
?>
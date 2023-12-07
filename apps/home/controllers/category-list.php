<?php 

   @include "../../configs/configs.php";
   session_start();

    function getListCategory() {
      $options = array(
        'order_by' => 'category.id',
      );
      return get_all('category', $options);
    }
    $list_category = getListCategory();
?>
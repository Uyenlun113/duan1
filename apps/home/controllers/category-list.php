<?php 

   @include "../../configs/configs.php";
    function getListCategory() {
      $options = array(
        'order_by' => 'category.id',
      );
      return get_all('category', $options);
    }
    $list_category = getListCategory();
?>
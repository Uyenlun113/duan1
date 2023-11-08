<?php
  include_once "../../../../configs/configs.php";  
  $options = array(
      'order_by' => 'id'
  );
  $list_categories = get_all('category', $options);
?>
<?php 

   @include "../../configs/configs.php";
    if (isset($_GET['booking'])) {
        $categoryId = intval($_GET['booking']);
        $categoryDetail = get_a_data('category', $categoryId);
    }
?>
<?php 

   @include "../../configs/configs.php";
    if (isset($_GET['category-details'])) {
        $categoryId = intval($_GET['category-details']);
        $categoryDetail = get_a_data('category', $categoryId);
    }
?>
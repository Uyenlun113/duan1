<?php

@include "../../configs/configs.php";
session_start();

function getListCategory($category_adult)
{
  $options = array(
    "select" =>"category.*, rooms.*",
    'order_by' => 'category.id',
    'join' => 'left join rooms on rooms.category_id = category.id'
  );
  if (!empty($category_adult)) {
        $options['where'] = " $category_adult <= category.category_adult";
    }
  return get_all('category', $options);
  
}
// $category_adult = isset($_GET['category_adult']) ? htmlspecialchars($_GET['category_adult']) : '';
// $list_category = getListCategory($category_adult);
// echo json_encode($list_category);
// echo json_encode(count($list_category));



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['filter_category'])) {
    $check_in_category = $_POST['check_in_category'];
    $check_out_category = $_POST['check_out_category'];
    $category_adult = $_POST['category_adult'];
    // echo ($check_in_category);
    // echo ($check_out_category);
    //     echo ($category_adult);

    if ($check_in_category && $check_out_category && $category_adult) {
      header("Location: category-list.php?check_in_category=$check_in_category&check_out_category=$check_out_category&category_adult=$category_adult");
    }
  }
}
?>
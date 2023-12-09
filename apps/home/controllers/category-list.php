<?php

@include "../../configs/configs.php";
session_start();

function getListCategory($search_category, $category_adult, $check_in_category, $check_out_category)
{
  $options = array(
    "select" => "DISTINCT category.*",
  );
  if (!empty($search_category)) {
    $options['where'] = "category.category_name LIKE '%$search_category%'";
  }
  if (!empty($category_adult) && !empty($check_in_category) && !empty($check_out_category)) {
    $options['join'] = 'LEFT JOIN rooms on category.id = rooms.category_id 
                        LEFT JOIN checking_rooms on rooms.id = checking_rooms.rooms_id';
    $options['where'] = "(category.category_name LIKE '%$search_category%') and (category.category_adult >= $category_adult) and (rooms.id is null or 
    ( NOT EXISTS ( SELECT 1 FROM checking_rooms cr2 WHERE rooms.id = cr2.rooms_id 
    and ( (cr2.checking_rooms_checkin <= '$check_in_category' and '$check_in_category' <= cr2.checking_rooms_checkout) 
    or (cr2.checking_rooms_checkin <= '$check_out_category' and '$check_out_category' <= cr2.checking_rooms_checkout) 
    or ('$check_in_category' <= cr2.checking_rooms_checkin and cr2.checking_rooms_checkin <= '$check_out_category')
    or ('$check_in_category' <= cr2.checking_rooms_checkout and cr2.checking_rooms_checkout <= '$check_out_category') ) ) )) ";
  }
  return get_all('category', $options);

}
if (isset($_GET['category_adult'])) {
  $category_adult = htmlspecialchars($_GET['category_adult']);
}
if (isset($_GET['check_in_category'])) {
  $check_in_category = (new DateTime(htmlspecialchars($_GET['check_in_category'])))->format('Y-m-d');

}
if (isset($_GET['check_out_category'])) {
  $check_out_category = (new DateTime(htmlspecialchars($_GET['check_out_category'])))->format('Y-m-d');
}
if (isset($_GET['search_category'])) {
  $search_category = htmlspecialchars($_GET['search_category']);
}
$list_category = getListCategory($search_category, $category_adult, $check_in_category, $check_out_category);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['filter_category'])) {
    $check_in_category = $_POST['check_in_category'];
    $check_out_category = $_POST['check_out_category'];
    $category_adult_category = $_POST['category_adult'];
    $search_category = $_POST['search_category'];
    if ($check_in_category && $check_out_category && $category_adult_category) {
      header("Location: category-list.php?check_in_category=$check_in_category&check_out_category=$check_out_category&category_adult=$category_adult_category&search_category=$search_category");
    }
  }
}
?>
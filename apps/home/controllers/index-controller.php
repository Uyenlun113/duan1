<?php

@include "../../configs/configs.php";
session_start();

function getTop4PopularCategory()
{
  $options = array(
    'order_by' => 'category.id',
    "limit" => 4,
    "offset" => 0,
  );
  return get_all('category', $options);
}
$list_category_popular = getTop4PopularCategory();

function getServiceByCategory($category_id)
{
  $options = array(
    'where' => "category_id = $category_id",
    'join' => 'join service on service.id = category_service.service_id',
    "limit" => 4,
    "offset" => 0,
  );
  return get_all('category_service', $options);
}
?>
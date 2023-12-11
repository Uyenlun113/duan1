<?php
@include "../../configs/configs.php";
session_start();
if (isset($_SESSION['login_home'])) {
    $userData = $_SESSION['login_home'];
}

if (isset($_GET['category-details'])) {
    $categoryId = intval($_GET['category-details']);
    $categoryDetail = get_a_data('category', $categoryId);
}

function addComment($comment_code, $comment_content, $comment_vote, $user_id, $category_id)
{
    $data = array(
        'comment_code' => $comment_code,
        'comment_content' => $comment_content,
        'comment_vote' => $comment_vote,
        'user_id' => $user_id,
        'category_id' => $category_id,
        'create_date' => date('Y-m-d'),
        'update_date' => date('Y-m-d')
    );
    return save_and_get_result('comments', $data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["comment"])) {
        $comment_code = rand(00, 999999);
        $comment_content = $_POST["comment_content"];
        $comment_vote = $_POST["comment_vote"];
        $user_id = $userData['id'];
        $category_id = $_POST["category_id"];
        $createComment = addComment($comment_code, $comment_content, $comment_vote, $user_id, $category_id);
        if ($createComment) {
            header('Location: category-details.php?action=detail&category-details=' . $category_id);
        }
    }
}

function getComment($userData, $categoryDetail)
{
    $options = array(
        'select' => 'comments.*, users.*, users.id as users_id, comments.id as comments_id',
        'order_by' => 'comments.id desc',
        'where' => 'comment_parent_id is null and category_id = ' . $categoryDetail["id"],
        'join' => 'right join users on users.id = comments.user_id'

    );
    return get_all('comments', $options);
}

$list_comments = getComment($userData, $categoryDetail);

$totalVotes = 0;

if (count($list_comments) > 0) {
    foreach ($list_comments as $comment) {
        $totalVotes += $comment['comment_vote'];
    }
    $totalVotes = round($totalVotes / count($list_comments), 0);
}

function getCategoteService($categoryDetail)
{
    $options = array(
        'where' => 'category_id = ' . $categoryDetail["id"],
        'join' => 'join service on service.id = category_service.service_id'
    );
    return get_all('category_service', $options);
}
$listCategoryService = getCategoteService($categoryDetail);


function getCommentChild($comment_parent_id)
{
    $options = array(
        'order_by' => 'comments.id desc',
        'where' => 'comment_parent_id = ' . $comment_parent_id,
        'join' => 'join users on users.id = comments.user_id'
    );
    return get_all('comments', $options);
}

function getListCategorySimilar($category_id)
{
    $options = array(
        "where" => "category.id != $category_id",
        "limit" => 3,
        "offset" => 0,
    );
    return get_all('category', $options);

}
$listCategorySimilar = getListCategorySimilar($categoryDetail['id']);
?>
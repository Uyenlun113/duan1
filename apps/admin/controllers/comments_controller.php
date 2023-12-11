<?php
include_once "../../../../configs/configs.php";
include_once "../../../../configs/check-auth-admin.php";
session_start();

//list danh sách
function getAllComment()
{
    $options = array(
        'select' => 'comments.*,category.category_name as category_name,users.users_name as user_name,category.id as category_id',
        'order_by' => 'comments.id',
        'join' => 'left JOIN category ON comments.category_id = category.id JOIN users ON comments.user_id = users.id',
        'where' => 'comment_parent_id is null'
    );
    return get_all('comments', $options);
}
$list_comment = getAllComment();

if (intval($_GET['feedback']) && intval($_GET['category_id'])) {
    $feedback_id = intval($_GET['feedback']);
    $category_id = intval($_GET['category_id']);
}

function addComment($comment_content, $dataLoginUser, $category_id, $feedback_id)
{
    $data = array(
        'comment_content' => $comment_content,
        'user_id' => $dataLoginUser['id'],
        'category_id' => $category_id,
        'comment_parent_id' => $feedback_id,
        'create_date' => date('Y-m-d')
    );
    return save_and_get_result('comments', $data);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["feedback_comment"])) {
        $comment_content = $_POST["comment_content"];
        $category_id = $_POST["category_id"];
        $feedback_id = $_POST["feedback_id"];

        $addResult = addComment($comment_content, $dataLoginUser, $category_id, $feedback_id);
        if ($addResult) {
            header('location:list_comment.php');
        } else {
        }
    }
}

function deleteComment($id)
{
    $where = "id = $id";
    return delete_data('comments', $where);
}
if (isset($_GET["delete_comment_id"])) {
    $id = $_GET["delete_comment_id"];
    $deleteResult = deleteComment($id);
    if ($deleteResult) {
        header('location:list_comment.php');
    } else {
    }
}

?>
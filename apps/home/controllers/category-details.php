<?php 

   @include "../../configs/configs.php";
    if(isset($_SESSION['data_login'])) {
        $userData = $_SESSION['data_login'];
    }

    if (isset($_GET['category-details'])) {
        $categoryId = intval($_GET['category-details']);
        $categoryDetail = get_a_data('category', $categoryId);
    }

    function addComment($comment_code, $comment_content, $comment_vote, $user_id, $category_id) {
        $data = array(
            'comment_code' => $comment_code,
            'comment_content' =>$comment_content,
            'comment_vote' =>$comment_vote,
            'user_id' =>$user_id,
            'category_id' =>$category_id,
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
            if($createComment){
                header('Location: category-details.php?action=detail&category-details=' .  $category_id);
            }
        }
    }

    function getComment($userData, $categoryDetail) {
      $options = array(
        'order_by' => 'comments.id desc',
        'where' => 'category_id = ' . $categoryDetail["id"],
        'join' => 'join users on users.id = comments.user_id'

      );
      return get_all('comments', $options);
    }
    $list_comments = getComment($userData, $categoryDetail);
?>
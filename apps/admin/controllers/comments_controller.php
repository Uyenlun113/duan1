<?php
    include_once "../../../../configs/configs.php";
    //list danh sách
    function getAllComment() {
        $options = array(
            'select' => 'comments.*,category.category_name as category_name,users.users_name as user_name',
            'order_by' => 'comments.id',
            'join' => 'JOIN category ON comments.category_id = category.id JOIN users ON comments.user_id = users.id'
        );
        return get_all('comments', $options);
    }
    $list_comment = getAllComment();
    
    function addComment($id_user, $id_room, $content, $vote) {
        $data = array(
            'id_user' => $id_user,
            'id_room' => $id_room,
            'content' => $content,
            'vote' => $vote,
            'create_date' => date('Y-m-d')
        );
        return save_and_get_result('comment', $data);
    }



    function updateComment($id,$id_user, $id_room, $content, $vote) {
        $data = array(
            'id_user' => $id_user,
            'id_room' => $id_room,
            'content' => $content,
            'vote' => $vote,
            'create_date' => date('Y-m-d')
        );
        $where = "id = $id";
        return update_data('comment', $data, $where);
    }

    function deleteComment($id) {
        $where = "id = $id";
        return delete_data('comments', $where);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_comment"])) {
            $id_user = $_POST["id_user"];
            $id_room = $_POST["id_room"];
            $content = $_POST["content"];
            $vote = $_POST["vote"];
            $addResult = addComment($code, $name, $description, $status);
            if ($addResult) {
                header('location:comment.php?controller=comment');
            } else {
            }
        } 
    }

    // lấy ra thông tin sản phẩm vào form sửa
    if (intval($_GET['update_comment'])) {
        $subComId = intval($_GET['update_comment']);
        return $detailComment = get_a_data('comment', $subComId);
    }   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["update_comment"])) {
        var_dump($_POST);
        $id_user = $_POST["id_user"];
        $id_room = $_POST["id_room"];
        $content = $_POST["content"];
        $vote = $_POST["vote"];
            $updateResult = updateComment($id,$id_user, $id_room, $content, $vote);
            if ($updateResult) {
                header('location:comment.php?controller=comment');
            } else {
            }
        }  
    }
    
    //Xóa data
    if (isset($_GET["delete_comment_id"])) {
        $id = $_GET["delete_comment_id"];
        $deleteResult = deleteComment($id);
        if ($deleteResult) {
            echo "<script>window.top.location='list_comment.php'</script>";
        } else {
        }
    }
?>
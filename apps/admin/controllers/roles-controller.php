<?php
    include_once "../../../../configs/configs.php";
    // if (!isset($_SESSION['login_admin'])) {
    //     echo "<script>window.top.location='../auth/login.php'</script>";
    // }
    function getListRoles() {
        $options = array('order_by' => 'id');
        return get_all('roles', $options);
    }
    $list_roles = getListRoles();

    function getListPermission() {
        $options = array('order_by' => 'id');
        return get_all('permission', $options);
    }
    $list_permission = getListPermission();

    function addRoles($roles_code, $roles_name,$roles_description) {
        $data = array(
            'roles_code' => $roles_code,
            'roles_name' => $roles_name,
            'roles_description' => $roles_description,
            'create_date' => date('Y-m-d')
        );
        return save_and_get_result('roles', $data);
    }

    function addRolesPermission($roles_id, $permision_id) {
        $data = array(
            'roles_id' => $roles_id,
            'permision_id' => $permision_id,
            'create_date' => date('Y-m-d')
        );
        return save_and_get_result('roles_permission', $data);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["create_roles"])) {
                $roles_code = $_POST["roles_code"];
                $roles_name = $_POST["roles_name"];
                $roles_description = $_POST["roles_description"];
                $addResultRoles = addRoles($roles_code, $roles_name,$roles_description);
                    if (isset($_POST["selected_permissions"]) && is_array($_POST["selected_permissions"])) {
                    foreach ($_POST["selected_permissions"] as $selected_permision_id) {
                        $addResult = addRolesPermission($addResultRoles['id'], $selected_permision_id);
                        if ($addResult) {
                            echo "<script>window.top.location='roles.php'</script>";
                        }
                    }
                } else {
                    echo "Không có checkbox nào được chọn.";
                }
        }
    }

    function deleteRoles($id) {
        $where = "id = $id";
        return delete_data('roles', $where);
    }

    if (isset($_GET["delete-roles-id"])){
    $id = $_GET["delete-roles-id"];
    $deleteResult = deleteRoles($id);
        if ($deleteResult) {
                    echo "<script>window.top.location='roles.php'</script>";

        echo "Xóa thành công!";
        } else {
        echo "Chưa xóa được loại phòng. $deleteResult";
        }
    }


     // lấy ra thông tin sản phẩm vào form sửa
if (isset($_GET['update-roles'])) {
    $roles_id = intval($_GET['update-roles']);
    $detail_roles = get_a_data('roles', $roles_id);
       function getCheckedPermission($roles_id) {
        $options = array('select' => 'roles_permission.permision_id','order_by' => 'id',
    "where" =>"roles_id =" .$roles_id);
        return get_all('roles_permission', $options);
    }
    $list_checked_permission = getCheckedPermission($roles_id);
}

function updateRoles($id, $roles_code, $roles_name, $roles_description) {
        $data = array(
            'roles_code' => $roles_code,
            'roles_name' => $roles_name,
            'roles_description' => $roles_description,
            'create_date' => date('Y-m-d')
        );
    $where = "id = $id";
return update_data('roles', $data, $where);
}

    function deleteRolesPermissionOld($id) {
        $where = "roles_id = " . $id;
        return delete_data('roles_permission', $where);
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update_roles"])) {
        $id = $_POST["id"];
        $roles_code = $_POST["roles_code"];
        $roles_name = $_POST["roles_name"];
        $roles_description = $_POST["roles_description"];
        $updateRolesResult = updateRoles($id, $roles_code, $roles_name, $roles_description);
        $deleteResult = deleteRolesPermissionOld($id);
        echo json_encode($deleteResult);
        if (isset($_POST["selected_permissions"]) && is_array($_POST["selected_permissions"])) {
            foreach ($_POST["selected_permissions"] as $selected_permision_id) {
                $updateRolesPermissionResult = addRolesPermission($id, $selected_permision_id);
            }
        }
        if ( $updateRolesResult && $updateRolesPermissionResult) {
            echo "<script>window.top.location='roles.php'</script>";
        } else {
            echo "Chưa cập nhật được loại phòng. $updateResult";
        }
    }
}

?>
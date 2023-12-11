<?php
include_once '../../../../configs/configs.php';
    include_once "../../../../configs/check-auth-admin.php";


function getListStaff() {
    $options = array(
        'select' => 'users.*',
        'order_by' => 'users.id',
        'where' => 'users.users_type = 1'
    );
    return get_all( 'users', $options );
}
function getListCustomer($search_customer) {
    $options = array(
        'select' => 'users.*',
        'order_by' => 'users.id',
        'where' => 'users.users_type = 2'
    );
    if (!empty($search_customer)) {
        $options['where'] = "users.users_name LIKE '%$search_customer%' OR users.users_code LIKE '%$search_customer%'";
    }
    return get_all( 'users', $options );
}
$searchValue = isset($_GET['search_customer']) ? htmlspecialchars($_GET['search_customer']) : '';

$list_staff = getListStaff();
$list_customer = getListCustomer($searchValue);

function handleCreateStaff( $users_code, $users_name, $users_avatar, $users_email, $users_account, $users_password, $users_CCCD, $users_phone_number, $users_birthday, $users_address ) {
    $data = array(
        'users_code' => $users_code,
        'users_name' => $users_name,
        'users_avatar' => $users_avatar,
        'users_email' => $users_email,
        'users_account' => $users_account,
        'users_password' => $users_password,
        'users_CCCD' => $users_CCCD,
        'users_phone_number' => $users_phone_number,
        'users_birthday' => $users_birthday,
        'users_address' => $users_address,
        'users_type' => 1,
        'create_date' => date( 'Y-m-d' ),
        'update_date' => date( 'Y-m-d' )
    );
    return save_and_get_result( 'users', $data );
}

function handleRolesUser( $users_id, $roles_id ) {
    $data = array(
        'users_id' => $users_id,
        'roles_id' => $roles_id,
        'create_date' => date( 'Y-m-d' )
    );
    return save_and_get_result( 'roles_users', $data );
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if ( isset( $_POST[ 'create_staff' ] ) ) {
        $users_code = $_POST[ 'users_code' ];
        $users_name = $_POST[ 'users_name' ];
        $users_email = $_POST[ 'users_email' ];
        $users_account = $_POST[ 'users_account' ];
        $users_password = $_POST[ 'users_password' ];
        $users_CCCD = $_POST[ 'users_CCCD' ];
        $users_phone_number = $_POST[ 'users_phone_number' ];
        $users_birthday = $_POST[ 'users_birthday' ];
        $users_address = $_POST[ 'users_address' ];
        if ( $_FILES[ 'users_avatar' ][ 'error' ] === UPLOAD_ERR_OK ) {
            $users_avatar = 'users/' . $_FILES[ 'users_avatar' ][ 'name' ];
            $temp_path = $_FILES[ 'users_avatar' ][ 'tmp_name' ];
            move_uploaded_file( $temp_path, $users_avatar );
            $addStaffResult = handleCreateStaff( $users_code, $users_name, $users_avatar, $users_email, $users_account, $users_password, $users_CCCD, $users_phone_number, $users_birthday, $users_address );
            if ( isset( $_POST[ 'list_roles_staff' ] ) && is_array( $_POST[ 'list_roles_staff' ] ) ) {
                $selectedRoles = $_POST[ 'list_roles_staff' ];
                foreach ( $selectedRoles as $selectedRole ) {
                    handleRolesUser( $addStaffResult[ 'id' ], $selectedRole );
                }
            }
            if ( $addStaffResult ) {
                echo "<script>window.top.location='list_staff.php'</script>";
            } else {
                echo "Chưa thêm được nhân viên. $addResult";
            }
        } else {
            echo 'Lỗi tải lên hình ảnh: ' . $_FILES[ 'users_avatar' ][ 'error' ];
        }
    }
}

if ( isset( $_GET[ 'update_staff' ] ) ) {
    $id = intval( $_GET[ 'update_staff' ] );
    $detail_staff = get_a_data( 'users', $id );
}

function deleteCustomer( $id ) {
    $where = "id = $id";
    return delete_data( 'users', $where );
}

//Xóa data
if ( isset( $_GET[ 'delete_customer_id' ] ) ) {
    $id = $_GET[ 'delete_customer_id' ];
    $deleteResult = deleteCustomer( $id );
    if ( $deleteResult ) {
        echo "<script>window.top.location='list_customer.php'</script>";

        echo 'Xóa thành công!';
    } else {

    }
}
if ( isset( $_GET[ 'delete_staff_id' ] ) ) {
    $id = $_GET[ 'delete_staff_id' ];
    $deleteResult = deleteCustomer( $id );
    if ( $deleteResult ) {
        echo "<script>window.top.location='list_staff.php'</script>";

        echo 'Xóa thành công!';
    } else {

    }
}

function getListRoles() {
    $options = array(
        'order_by' => 'roles.id',
    );
    return get_all( 'roles', $options );

}
$list_roles = getListRoles();

function getListRolesDetailUser( $detail_staff ) {
    $options = array(
        'select' => 'roles_users.roles_id',
        'where' => 'users_id ='. $detail_staff[ 'id' ],
    );
    return get_all( 'roles_users', $options );

}
$list_roles_users_detail = getListRolesDetailUser( $detail_staff );

function handleUpdateStaff( $id, $users_code, $users_name, $users_avatar, $users_email, $users_account, $users_password, $users_CCCD, $users_phone_number, $users_birthday, $users_address )
 {
    $data = array(
        'users_code' => $users_code,
        'users_name' => $users_name,
        'users_avatar' =>  $users_avatar == 'users/' ? $users_avatar[ 'users_avatar' ]  : $users_avatar,
        'users_email' => $users_email,
        'users_account' => $users_account,
        'users_password' => $users_password,
        'users_CCCD' => $users_CCCD,
        'users_phone_number' => $users_phone_number,
        'users_birthday' => $users_birthday,
        'users_address' => $users_address,
        'users_type' => 1,
        'update_date' => date( 'Y-m-d' )
    );
    $where = "id = $id";
    return update_data( 'users', $data, $where );
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if ( isset( $_POST[ 'update_staff' ] ) ) {

        $id = $_POST[ 'id' ];
        $users_code = $_POST[ 'users_code' ];
        $users_name = $_POST[ 'users_name' ];
        $users_email = $_POST[ 'users_email' ];
        $users_account = $_POST[ 'users_account' ];
        $users_password = $_POST[ 'users_password' ];
        $users_CCCD = $_POST[ 'users_CCCD' ];
        $users_phone_number = $_POST[ 'users_phone_number' ];
        $users_birthday = $_POST[ 'users_birthday' ];
        $users_address = $_POST[ 'users_address' ];
        if ( $_FILES[ 'users_avatar' ][ 'error' ] === UPLOAD_ERR_OK ) {
            $users_avatar = 'users/' . $_FILES[ 'users_avatar' ][ 'name' ];
            $temp_path = $_FILES[ 'users_avatar' ][ 'tmp_name' ];
            move_uploaded_file( $temp_path, $users_avatar );
            $updateStaffResult = handleUpdateStaff( $id, $users_code, $users_name, $users_avatar, $users_email, $users_account, $users_password, $users_CCCD, $users_phone_number, $users_birthday, $users_address );
            $where = "users_id = $id";
            delete_data( 'roles_users', $where );
            echo json_encode($updateStaffResult);
            if ( isset( $_POST[ 'list_roles_staff' ] ) && is_array( $_POST[ 'list_roles_staff' ] ) ) {
                $selectedRoles = $_POST[ 'list_roles_staff' ];
                foreach ( $selectedRoles as $selectedRole ) {
                    handleRolesUser( $id, $selectedRole );
                }
            }
            echo json_encode($updateStaffResult);
            if ( $updateStaffResult ) {
                echo "<script>window.top.location='list_staff.php'</script>";
            } else {
                echo "Chưa thêm được nhân viên. $addResult";
            }
        } else {
            echo 'Lỗi tải lên hình ảnh: ' . $_FILES[ 'users_avatar' ][ 'error' ];
        }
    }
}



?>
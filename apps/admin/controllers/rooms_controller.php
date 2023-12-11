<?php
include_once '../../../../configs/configs.php';
    include_once "../../../../configs/check-auth-admin.php";

function getListRooms($search_rooms) {
    $options = array(
        'select' => 'rooms.*, category.category_name as category_name , category.category_price as category_price , category.category_adult as category_adult',
        'order_by' => 'rooms.id',
        'join' => 'JOIN category ON rooms.category_id = category.id'
    );
    if (!empty($search_rooms)) {
        $options['where'] = "rooms.room_name LIKE '%$search_rooms%' OR rooms.room_code LIKE '%$search_rooms%'";
    }
    return get_all( 'rooms', $options );
}
$searchValue = isset($_GET['search_rooms']) ? htmlspecialchars($_GET['search_rooms']) : '';
$list_rooms = getListRooms($searchValue);

function getAllCategories() {
    $options = array(
        'order_by' => 'id',
        'where' => 'category_status = 1'
    );
    return get_all( 'category', $options );
}

function getAllService() {
    $options = array(
        'order_by' => 'id',
        'where' => 'status = 1'
    );
    return get_all( 'room_service', $options );
}

$list_categories = getAllCategories();
$allServices = getAllService();

function handleCreateRooms( $category_id, $room_code, $room_name, $room_image,  $room_description ) {
    $data = array(
        'category_id' => ( int )$category_id,
        'room_code' => $room_code,
        'room_name' => $room_name,
        'room_image' => $room_image,
        'room_description' => $room_description,
        'create_date' => date( 'Y-m-d' ),
        'update_date' => date( 'Y-m-d' )
    );
    return save_and_get_result( 'rooms', $data );
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if ( isset( $_POST[ 'create_rooms' ] ) ) {
        $category_id = $_POST[ 'category_id' ];
        $room_code = $_POST[ 'room_code' ];
        $room_name = $_POST[ 'room_name' ];
        $room_description = $_POST[ 'room_description' ];
        if ( $_FILES[ 'room_image' ][ 'error' ] === UPLOAD_ERR_OK ) {
            $room_image = 'rooms/' . $_FILES[ 'room_image' ][ 'name' ];
            $temp_path = $_FILES[ 'room_image' ][ 'tmp_name' ];
            move_uploaded_file( $temp_path, $room_image );
            $addResult = handleCreateRooms( $category_id, $room_code, $room_name, $room_image, $room_description);
            if ( $addResult ) {
                echo "<script>window.top.location='list_rooms.php'</script>";
            } else {
                echo "Chưa thêm được loại phòng. $addResult";
            }
        } else {
            echo 'Lỗi tải lên hình ảnh: ' . $_FILES[ 'room_image' ][ 'error' ];
        }
    }

}

// lấy ra thông tin sản phẩm vào form sửa
if ( isset( $_GET[ 'update_rooms' ] ) ) {
    $room_id = intval( $_GET[ 'update_rooms' ] );
    $detail_rooms = get_a_data( 'rooms', $room_id );
}

function updaterooms( $id, $category_id, $room_code, $room_name, $room_image, $room_description )
 {
    $detail_rooms = get_a_data( 'rooms', $id );

    $data = array(
        'category_id' => ( int )$category_id,
        'room_code' => $room_code,
        'room_name' => $room_name,
        'room_image' =>  $room_image == 'rooms/' ? $detail_rooms[ 'room_image' ]  : $room_image,
        'room_description' => $room_description,
        'update_date' => date( 'Y-m-d' )
    );

    $where = "id = $id";
    return update_data( 'rooms', $data, $where );
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if ( isset( $_POST[ 'update_rooms' ] ) ) {
        $id = $_POST[ 'id' ];
        $category_id = $_POST[ 'category_id' ];
        $room_code = $_POST[ 'room_code' ];
        $room_name = $_POST[ 'room_name' ];
        $room_description = $_POST[ 'room_description' ];
        $room_image =  ( isset( $_FILES[ 'room_image' ][ 'name' ] ) ) ? 'rooms/'.$_FILES[ 'room_image' ][ 'name' ] :[];
        $target_dir = '../../upload/rooms/';
        $targetFile = $target_dir . basename( $_FILES[ 'room_image' ][ 'name' ] );
        $updateResult = updaterooms( $id, $category_id, $room_code, $room_name, $room_image, $room_description );
        if ( $updateResult ) {
            echo "<script>window.top.location='list_rooms.php'</script>";
            echo 'Cập nhật thành công!';
        } else {
            echo "Chưa cập nhật được loại phòng. $updateResult";
        }
    }
}

function deleterooms( $id ) {
    $where = "id = $id";
    return delete_data( 'rooms', $where );
}

//Xóa data
if ( isset( $_GET[ 'delete_rooms_id' ] ) ) {
    $id = $_GET[ 'delete_rooms_id' ];
    $deleteResult = deleterooms( $id );
    if ( $deleteResult ) {
        echo "<script>window.top.location='list_rooms.php'</script>";

        echo 'Xóa thành công!';
    } else {
        echo "Chưa xóa được loại phòng. $deleteResult";
    }
}
?>
<?php
session_start();
$dataLoginUser = $_SESSION['login_admin'];
function checkLogin()
{
    if (!isset($_SESSION['login_admin'])) {
        header('Location: ../auth/login.php');
    }
}
checkLogin();
function pdo_get_connection()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=project1", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        return null;
    }
}

// Hàm tạo chuỗi ngẫu nhiên
function generateRandomString($type, $length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return "$type-$randomString";
}

// Hàm lấy tất cả dữ liệu từ bảng có các tùy chọn
function get_all($table, $options = array())
{
    $conn = pdo_get_connection();

    if ($conn === null) {
        return array();
    }

    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    $join = isset($options['join']) ? $options['join'] : '';

    try {
        $sql = "SELECT $select FROM `$table` $join $where $order_by $limit";
        $query = $conn->query($sql);
        $data = array();

        if ($query) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
        }

        return $data;
    } catch (PDOException $e) {
        return array();
    }
}

// Hàm lấy một dòng dữ liệu theo ID
function get_a_data($table, $id, $select = '*')
{
    $id = intval($id);
    $conn = pdo_get_connection();
    $sql = "SELECT $select FROM `$table` WHERE id=:id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

// Hàm lưu dữ liệu và lấy kết quả
function save_and_get_result($table, $data = array())
{
    $conn = pdo_get_connection();

    if ($conn === null) {
        return 'Error: Unable to connect to the database.';
    }

    $keys = array_keys($data);
    $columns = implode(',', $keys);
    $placeholders = ':' . implode(',:', $keys);

    try {
        $stmt = $conn->prepare("INSERT INTO `$table` ($columns) VALUES ($placeholders)");
        $stmt->execute($data);
        $lastInsertId = $conn->lastInsertId();
        $selectStmt = $conn->prepare("SELECT * FROM `$table` WHERE id = :lastInsertId");
        $selectStmt->bindParam(':lastInsertId', $lastInsertId, PDO::PARAM_INT);
        $selectStmt->execute();
        $insertedData = $selectStmt->fetch(PDO::FETCH_ASSOC);

        return $insertedData;
    } catch (PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
}

// Hàm cập nhật dữ liệu
function update_data($table, $data = array(), $where)
{
    $conn = pdo_get_connection();

    if ($conn === null) {
        return 'Error: Unable to connect to the database.';
    }

    $setClause = '';

    foreach ($data as $key => $value) {
        $setClause .= "`$key`=:$key,";
    }

    $setClause = rtrim($setClause, ',');

    try {
        $stmt = $conn->prepare("UPDATE `$table` SET $setClause WHERE $where");
        $stmt->execute($data);
        return true;
        // Thành công
    } catch (PDOException $e) {
        return 'Error: ' . $e->getMessage();
        // Thất bại với thông báo lỗi
    }
}

// Hàm xóa dữ liệu
function delete_data($table, $where)
{
    $conn = pdo_get_connection();

    if ($conn === null) {
        return 'Error: Unable to connect to the database.';
    }

    try {
        $stmt = $conn->prepare("DELETE FROM `$table` WHERE $where ");
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
}

// Kiểm tra quyền CREATE_ROOM
$isCreateRoom = strpos($dataLoginUser['permission_codes'], 'CREATE_ROOM') !== false;
$isDeleteRoom = strpos($dataLoginUser['permission_codes'], 'DELETE_ROOM') !== false;
$isUpdateRoom = strpos($dataLoginUser['permission_codes'], 'UPDATE_ROOM') !== false;
$isDeleteStaff = strpos($dataLoginUser['permission_codes'], 'DELETE_STAFF') !== false;
?>
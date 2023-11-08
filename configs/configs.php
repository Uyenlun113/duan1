<?php

  function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
      $conn = new PDO("mysql:host=$servername;dbname=project1", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch(PDOException $e) {
      return null;
    }
}

function get_all($table, $options = array()) {
    $conn = pdo_get_connection();
    if ($conn === null) {
        return array();
    }

    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

    try {
        $sql = "SELECT $select FROM `$table` $where $order_by $limit";
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

function save_and_get_result($table, $data = array())
{
    $values = array();
    global $linkConnectDB;
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($linkConnectDB, $value);
        $values[] = "`$key`='$value'";
    }
    $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    $result = mysqli_query($linkConnectDB, $sql);
    if (!$result) {
        $result = mysqli_error($linkConnectDB);
    }
}

?>
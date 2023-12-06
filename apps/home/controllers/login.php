<?php
@include "../../configs/configs.php";


if (isset($_POST["login_home"])) {
    $conn = pdo_get_connection();
    if ($conn === null) {
        exit();
    }
    $users_account = $_POST["users_account"];
    $users_password = $_POST["users_password"];
    try {
        $sql = "SELECT * FROM users WHERE users_account = :users_account AND users_password = :users_password AND users_type = 2";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':users_account', $users_account, PDO::PARAM_STR);
        $stmt->bindParam(':users_password', $users_password, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $_SESSION['login_home'] = $data;
            echo "<script>window.top.location='index.php'</script>";
            exit();
        }
    } catch (PDOException $e) {
        exit();
    }
}
?>
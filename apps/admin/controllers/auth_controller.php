<?php
    include_once "../../../../configs/configs.php";

    if (isset($_POST["login_admin"])) {
      $conn = pdo_get_connection();
      if ($conn === null) {
          return array();
      }

      $users_account = $_POST["users_account"];
      $users_password = $_POST["users_password"];

      try {
          $sql = "SELECT * FROM users WHERE users_account = '$users_account' AND users_password = '$users_password' AND users_type = 1";
          $query = $conn->query($sql);
          
          if ($query) {
              $data = $query->fetch(PDO::FETCH_ASSOC);
              if ($data) {

              $_SESSION['data_login']=$data;
                echo "<script>window.top.location='../dashboard/index.php'</script>";

              
      } else {
                  echo json_encode(array("error" => "Invalid credentials"));
              }
          }
      } catch (PDOException $e) {
          return array();
      }
    }

// if (isset($_GET['logout_admin'])) {
//     $_SESSION = array();
//     session_destroy();
//     echo "<script>window.top.location='../auth/login.php'</script>";
//     exit();
// }

if (isset($_SESSION['data_login'])) {
    // Retrieve the value of the session variable
    $dataLogin = $_SESSION['data_login'];

    // Now you can use $dataLogin in your code
    echo "Data from session: " . json_encode($dataLogin);
} else {
    echo "Session variable does not exist!";
}

?>
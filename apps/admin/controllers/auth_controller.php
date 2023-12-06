<?php
function pdo_get_connection()
 {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    try {
        $conn = new PDO( "mysql:host=$servername;dbname=project1", $username, $password );
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $conn;
    } catch ( PDOException $e ) {
        return null;
    }
}session_start();

if ( isset( $_POST[ 'login_admin' ] ) ) {
    $conn = pdo_get_connection();
    if ( $conn === null ) {
        return array();
    }
    $users_account = $_POST[ 'users_account' ];
    $users_password = $_POST[ 'users_password' ];
    try {
        $sql =
        "SELECT users.*, GROUP_CONCAT(permission.permision_code) AS permission_codes  FROM users JOIN roles_users ON roles_users.users_id = users.id JOIN roles_permission ON roles_permission.roles_id = roles_users.roles_id JOIN permission ON permission.id = roles_permission.permision_id WHERE users_account = '$users_account' AND users_password = '$users_password' AND users_type = 1 GROUP BY users.id;";
        $query = $conn->query( $sql );
        if ( $query ) {
            $data = $query->fetch( PDO::FETCH_ASSOC );
            if ( $data ) {
                $_SESSION[ 'login_admin' ] = $data;
                    header('Location: ../dashboard/index.php'); 
            } else {
                echo json_encode( array( 'error' => 'Invalid credentials' ) );
            }
        }
    } catch ( PDOException $e ) {
        return array();
    }
}
if ( isset( $_GET[ 'logout_admin' ] ) ) {
    $_SESSION = array();
    session_destroy();
    header( 'Location: ../auth/login.php' );
}
?>
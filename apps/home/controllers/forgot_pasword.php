<?php

require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/Exception.php");
require("../PHPMailer/src/SMTP.php");

// Database connection parameters
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project1';

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}

// Query to retrieve email addresses from the 'user' table
$sql = "SELECT users_email , id  FROM users";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->Username = "thiuyen1132004@gmail.com";
    $mail->Password = "alhu vhoe zcln ercj";
    $mail->SetFrom("thiuyen1132004@gmail.com");
    $mail->Subject = "doi mat khau";
    $mail->Body = "hello";

    // Loop through the results and add each email address to the recipient list
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $mail->AddAddress($row['users_email']);
    }

    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Check mail để đổi mật khẩu";
    }
} else {
    echo "No email addresses found in the database.";
}

// Close the database connection
$conn = null;
?>
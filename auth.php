<?php

session_start();

include('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$authSql = "SELECT * FROM user WHERE email='$email' && password='$password' && verified = '1'";
$authRow = $conn->query($authSql);

$authFailedSql = "SELECT * FROM user WHERE email='$email' && password='$password' && verified = '0'";
$authFailedSqlRow = $conn->query($authFailedSql);
if ($authFailedSqlRow->num_rows > 0) {
    while($row = $authFailedSqlRow->fetch_assoc()) {
        $_SESSION['email'] = $row['email'];
        header("Location: emailverification.php");
    }

}

if ($authRow->num_rows > 0) {
    while($row = $authRow->fetch_assoc()) {
        $_SESSION['uname'] = $row['name'];
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: index.php");
    }

}

else {
    echo "Your Email or Password is wrong!";

}





$conn -> close();


?>
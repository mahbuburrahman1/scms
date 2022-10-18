<?php

session_start();

include('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$authSql = "SELECT * FROM user WHERE email='$email' && password='$password'";
$authRow = $conn->query($authSql);



if ($authRow->num_rows > 0) {
    while($row = $authRow->fetch_assoc()) {
        $_SESSION['uname'] = $row['name'];
        header("Location: index.php");
    }

}

else {
    echo "Your Email or Password is wrong!";

}





$conn -> close();


?>
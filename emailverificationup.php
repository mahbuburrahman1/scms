<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email send</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
include('navbar.php');

$token = bin2hex(random_bytes(16));

$tokenSql = "INSERT INTO verification (user_email, verification_code)
            VALUES ('$email', '$token')";
$conn->query($tokenSql);




         $subject = "Email Verification From SCMS";
         
         $message = "<b>Wellcome to Student Consultation Management System. To verify your account please click the link below.</b>";
         $message .= "http://localhost/scms/authemail.php?email=$email&token=$token";
         
         $header = "From:mahbub4248@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($email,$subject,$message,$header);

         session_destroy();
         
         if( $retval == true ) {
            header("Refresh:3; url=login.php");
         }




?>


<div class="container m-3 pt-5 text-center">
    <h1>Verification link sent successfuly. Please check your email.
    </h1>
</div>

    
</body>
</html>
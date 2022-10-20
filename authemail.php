
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verified</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

include('connect.php');

$email = $_GET['email'];
$token = $_GET['token'];





$checkSql = "SELECT * FROM verification WHERE user_email = '$email' AND verification_code = '$token'";
$checkResult = $conn->query($checkSql);
if ($checkResult -> num_rows > 0) {
    $verifySql = "UPDATE user 
                    SET verified = 1
                    WHERE email = '$email'";
    $conn->query($verifySql);
   
    ?>
        <div class="container m-3 pt-5 text-center">
        <h1>Thanks, Your email has been verifed. Please log in to your account;
         </h1>
         </div>

    <?php
    header("Refresh:3; url=login.php");
} 



?>





    
</body>
</html>
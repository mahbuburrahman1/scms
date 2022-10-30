
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


$userInfosql = "SELECT * FROM user
              WHERE email = '$email'";
$userInfo = ($conn->query($userInfosql))->fetch_assoc();
$tid = $userInfo['user_id'];
if ($userInfo['role'] == 'teacher') {
    $teacherScheduleCreateSql = "INSERT INTO teacher_schedule (teacher_id, weekday, start_time, end_time, work)
                    VALUES
                        ('$tid','Saturday','09:00:00', '10:00:00', 'NULL'),
                        ('$tid','Saturday','10:00:00', '11:00:00', 'NULL'),
                        ('$tid','Saturday','11:00:00', '12:00:00', 'NULL'),
                        ('$tid','Saturday','12:00:00', '01:00:00', 'NULL'),
                        ('$tid','Saturday','01:00:00', '02:00:00', 'Launch Hour'),
                        ('$tid','Saturday','02:00:00', '03:00:00', 'NULL'),
                        ('$tid','Saturday','03:00:00', '04:00:00', 'NULL'),
                        ('$tid','Sunday','09:00:00', '10:00:00', 'NULL'),
                        ('$tid','Sunday','10:00:00', '11:00:00', 'NULL'),
                        ('$tid','Sunday','11:00:00', '12:00:00', 'NULL'),
                        ('$tid','Sunday','12:00:00', '01:00:00', 'NULL'),
                        ('$tid','Sunday','01:00:00', '02:00:00', 'Launch Hour'),
                        ('$tid','Sunday','02:00:00', '03:00:00', 'NULL'),
                        ('$tid','Sunday','03:00:00', '04:00:00', 'NULL'),
                        ('$tid','Monday','09:00:00', '10:00:00', 'NULL'),
                        ('$tid','Monday','10:00:00', '11:00:00', 'NULL'),
                        ('$tid','Monday','11:00:00', '12:00:00', 'NULL'),
                        ('$tid','Monday','12:00:00', '01:00:00', 'NULL'),
                        ('$tid','Monday','01:00:00', '02:00:00', 'Launch Hour'),
                        ('$tid','Monday','02:00:00', '03:00:00', 'NULL'),
                        ('$tid','Monday','03:00:00', '04:00:00', 'NULL'),
                        ('$tid','Tuesday','09:00:00', '10:00:00', 'NULL'),
                        ('$tid','Tuesday','10:00:00', '11:00:00', 'NULL'),
                        ('$tid','Tuesday','11:00:00', '12:00:00', 'NULL'),
                        ('$tid','Tuesday','12:00:00', '01:00:00', 'NULL'),
                        ('$tid','Tuesday','01:00:00', '02:00:00', 'Launch Hour'),
                        ('$tid','Tuesday','02:00:00', '03:00:00', 'NULL'),
                        ('$tid','Tuesday','03:00:00', '04:00:00', 'NULL'),
                        ('$tid','Wednesday','09:00:00', '10:00:00', 'NULL'),
                        ('$tid','Wednesday','10:00:00', '11:00:00', 'NULL'),
                        ('$tid','Wednesday','11:00:00', '12:00:00', 'NULL'),
                        ('$tid','Wednesday','12:00:00', '01:00:00', 'NULL'),
                        ('$tid','Wednesday','01:00:00', '02:00:00', 'Launch Hour'),
                        ('$tid','Wednesday','02:00:00', '03:00:00', 'NULL'),
                        ('$tid','Wednesday','03:00:00', '04:00:00', 'NULL')";

        $conn->query($teacherScheduleCreateSql);
}




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
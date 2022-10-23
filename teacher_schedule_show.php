<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>



    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>
<body>
<?php

session_start();
include('connect.php');
include('navbar.php');
$teacher_id = $_GET['tid'];

$teacherScheduleSql = "SELECT teacher_schedule.weekday as tweek  FROM teacher_schedule 
                        JOIN user ON teacher_schedule.teacher_id = user.user_id;
                        WHERE user_id = '$teacher_id'";
$teacherInfo = ($conn->query($teacherScheduleSql)) -> fetch_assoc();


?>




<div class= "container text-center rounded mt-5">
    <a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>
    <br>

    <h1>Schedule of <?php  echo $teacherInfo['tweek']?> </h1>
    

    
</div>


</body>
</html>
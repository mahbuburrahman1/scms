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
$uid = $_SESSION['user_id'];





$teacherScheduleSql = "SELECT teacher_schedule.teacher_id as tid, user.name as tname, teacher_schedule.weekday as tweek, teacher_schedule.start_time as tstime, teacher_schedule.end_time as tetime, teacher_schedule.work as twork  FROM teacher_schedule 
                        JOIN user ON teacher_schedule.teacher_id = user.user_id
                        WHERE user_id = '$uid'";
$teacherSqlRun = $conn->query($teacherScheduleSql);

$tnamesql = "SELECT name FROM user 
            where user_id = '$uid'";
$tname = ($conn->query($tnamesql))->fetch_assoc();


?>




<div class= "container clearfix text-center rounded mt-5">
    <a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>
    <br>
    <br>
    <h1>Schedule of <?php echo $tname['name'] ?></h1>

    <table class = "table table-bordered">
            <thead>
        
            <th scope="col">Weekday</th>
            <th scope="col">Start Time</th>
            <th scope="col">End Time</th>
            <th scope="col">Work</th>
            <th scope="col">Action</th>

            </thead>

            <tbody>

            <?php

            while ($teacherInfo = ($teacherSqlRun) -> fetch_assoc()) {
                echo "<tr>".
                       " <td>".$teacherInfo['tweek']."</td>".
                       " <td>".$teacherInfo['tstime']."</td>".
                       " <td>".$teacherInfo['tetime']."</td>".
                       " <td>".$teacherInfo['twork']."</td>".
                       " <td><button type='button' class='btn btn-success'>Edit</button></td>".
                   " </tr>";

            }
                
                

                

                

            ?>

            </tbody>
        
        
        </table>

        
    

    
</div>



</body>
</html>
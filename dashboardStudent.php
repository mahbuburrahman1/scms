<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>

<?php
session_start();
include('connect.php');
include('navbar.php');
$uid = $_SESSION['user_id'];
?>



<div class= "container text-center rounded mt-5">
<a class="btn btn-warning text-white float-start" href="notification.php" role="button">Notification</a>
<a class="btn btn-warning text-white mx-2 float-start" href="dashboardStudent.php" role="button">Dashboard</a>
<a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>
<br>

    <h3>Dashboard of  <?php echo $_SESSION['uname']?></h3>

    <?php 
    

        $scheduleFetchSql = "SELECT * FROM schedule_request 
                            where student_id = '$uid' AND status = 'accept' AND appointmentDate >= CURRENT_DATE";
        $scheduleFetch = $conn -> query ($scheduleFetchSql);
        
        
        
        ?>
        <table class = "table table-bordered">
            <thead>
            
                <th scope="col">Teacher Name</th>
                <th scope="col">Teacher Room</th>
                <th scope="col">Topic</th>
                <th scope="col">Date Time</th>


            </thead>

            <tbody>

            <?php
                while ($scheduleRow = $scheduleFetch->fetch_assoc()) {
                    $tsid = $scheduleRow['teacher_schedule_id'];
                    $teacherScheduleInfoSql = "SELECT * FROM teacher_schedule WHERE teacher_schedule_id = '$tsid' ";
                    $teacherScheduleInfo = $conn->query($teacherScheduleInfoSql)->fetch_assoc();
                    $tid = $teacherScheduleInfo['teacher_id'];
                    $teacherInfoSql = "SELECT * FROM user WHERE user_id = '$tid'";
                    $teacherInfo = $conn->query($teacherInfoSql)->fetch_assoc();
                echo "<tr>".
                       " <td>".$teacherInfo['name']."</td>".
                       " <td>".$teacherInfo['room']."</td>".
                       " <td>".$scheduleRow['topic']."</td>".
                       " <td>".$scheduleRow['appointmentDate']." ".$teacherScheduleInfo['start_time']."</td>".
                   " </tr>";

                }

                

            ?>

            </tbody>
        
        
        </table>
    <?php

    

    ?>

    
</div>

    
</body>
</html>
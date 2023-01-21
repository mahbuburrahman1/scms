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
    

        $scheduleFetchSql = "SELECT schedule_request.schedule_request_id as srid, teacher_schedule.teacher_schedule_id , schedule_request.teacher_schedule_id as tsid, teacher_schedule.teacher_id as tid, schedule_request.student_id as stdid, schedule_request.topic as topic, schedule_request.timeNeeded as timeNeeded, schedule_request.groupMember as gmember, schedule_request.isResearch as isresearch, schedule_request.appointmentDate as appdate, schedule_request.status FROM teacher_schedule
                            JOIN schedule_request ON teacher_schedule.teacher_schedule_id = schedule_request.teacher_schedule_id
                            WHERE teacher_schedule.teacher_id = '$uid' AND schedule_request.status = 'accept' AND schedule_request.appointmentDate >= CURRENT_DATE";
        $scheduleFetch = $conn -> query ($scheduleFetchSql);
        
        
        
        ?>
        <table class = "table table-bordered">
            <thead>
            
                <th scope="col">Student Name</th>
                <th scope="col">Topic</th>
                <th scope="col">Time Needed</th>
                <th scope="col">Group Member</th>
                <th scope="col">Is Research Student?</th>
                <th scope="col">Date Time</th>
                <th scope="col">Action</th>


            </thead>

            <tbody>

            <?php
                while ($scheduleRow = $scheduleFetch->fetch_assoc()) {
                    $tsid = $scheduleRow['tsid'];
                    $stdid = $scheduleRow['stdid'];
                    $srid = $scheduleRow['srid'];
                    $studentInfoSql = "SELECT * FROM user WHERE user_id = '$stdid'";
                    $studentInfo = $conn->query($studentInfoSql)->fetch_assoc();

                    $stimeSql = "SELECT * FROM teacher_schedule WHERE teacher_schedule_id = '$tsid'";
                    $stime = $conn->query($stimeSql)->fetch_assoc();
                echo "<tr>".
                       " <td>".$studentInfo['name']."</td>".
                       " <td>".$scheduleRow['topic']."</td>".
                       " <td>".$scheduleRow['timeNeeded']."</td>".
                       " <td>".$scheduleRow['gmember']."</td>".
                       " <td>".$scheduleRow['isresearch']."</td>".
                       " <td>".$scheduleRow['appdate']." ".$stime['start_time']."</td>".
                       " <td><a href='scheduleUpdateFrom.php?srid=".$srid."&tsid=".$tsid."'><button type='button' class='btn btn-success'>Edit</button></a></td>". 
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Schedule</title>



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


$tnamesql = "SELECT name FROM user 
            where user_id = '$uid'";
$tname = ($conn->query($tnamesql))->fetch_assoc();




$teacherScheduleSql = "SELECT schedule_request.schedule_request_id as sri, schedule_request.teacher_schedule_id, schedule_request.student_id, schedule_request.request_time, schedule_request.status, schedule_request.appointmentDate as appdate,  teacher_schedule.teacher_schedule_id as tsid, teacher_schedule.teacher_id as tid,  teacher_schedule.weekday as tweek, teacher_schedule.start_time as tstime, teacher_schedule.end_time as tetime, teacher_schedule.work as twork, user.user_id, user.name as sname, user.roll as sroll,  schedule_request.topic as rtopic, schedule_request.timeNeeded as rtneeded, schedule_request.groupMember as rgroupMember, schedule_request.isResearch as risResearch
        FROM ((schedule_request
        JOIN teacher_schedule ON schedule_request.teacher_schedule_id = teacher_schedule.teacher_schedule_id)
        JOIN user ON schedule_request.student_id = user.user_id)
        WHERE teacher_schedule.teacher_id = '$uid' AND schedule_request.status = 'pending'";
$teacherSqlRun = $conn->query($teacherScheduleSql);






?>




<div class= "container clearfix  rounded mt-5">
    <a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>
    <br>
    <br>
    <h1 class="text-center ">Schedule of <?php echo $tname['name'] ?></h1>

 <br>
  
        
    

    
</div>

<div class = "container">
 


    <div> 
    <table class = "table text-center table-bordered">
        <thead>
        <th scope="col">Date</th>
            <th scope="col">Start Time</th>
            <th scope="col">End Time</th>
          
            <th scope="col">Student Roll</th>
            <th scope="col">Student Name</th>
            <th scope="col">Topic</th>
            <th scope="col">Time Needed</th>
            <th scope="col">Group Member</th>
            <th scope="col">Research Student</th>
            <th scope="col">Action</th>
        </thead>       
        
        <tbody>
            <?php
                while ($teacherInfo = ($teacherSqlRun) -> fetch_assoc()) {
                    $sri = $teacherInfo['sri'];
                    echo "<tr>".
                    "<td style='display:none'>".$sri."</td>".
                    "<td>".$teacherInfo['appdate']."</td>".
                    "<td>".$teacherInfo['tstime']."</td>".
                    " <td>".$teacherInfo['tetime']."</td>".
                   
                    " <td>".$teacherInfo['sroll']."</td>".
                    " <td>".$teacherInfo['sname']."</td>".
                    " <td>".$teacherInfo['rtopic']."</td>".
                    " <td>".$teacherInfo['rtneeded']." min </td>".
                    " <td>".$teacherInfo['rgroupMember']."</td>".
                    " <td>".$teacherInfo['risResearch']."</td>".
                    
                    " <td><a href='acceptSchedule.php?sri=".$sri."'><button type='button' class='btn btn-success m-1'>Accept</button></a><a href='rejectSchedule.php?sri=".$sri."'><button type='button' class='btn btn-danger'>Reject</button></a></td>". 
                    "</tr>";
                 }


            ?>

            
        </tbody>

    </table>
    </div>


</div>





</body>
</html>
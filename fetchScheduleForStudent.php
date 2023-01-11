<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>



<?php
session_start();
include('connect.php');
$teacher_id = $_SESSION['teacher_id'];
$sday = $_GET['day'];
$date = $_GET['date'];
$uid = $_SESSION['user_id'];





$teacherScheduleSql = "SELECT teacher_schedule.teacher_schedule_id as tsid, teacher_schedule.teacher_id as tid, user.name as tname, teacher_schedule.weekday as tweek, teacher_schedule.start_time as tstime, teacher_schedule.end_time as tetime, teacher_schedule.work as twork  FROM teacher_schedule 
                        JOIN user ON teacher_schedule.teacher_id = user.user_id
                        WHERE user_id = '$teacher_id' AND weekday = '$sday'";
$teacherSqlRun = $conn->query($teacherScheduleSql);





?>
<table class = "table text-center table-bordered">
        <thead>
            <th scope="col">Start Time</th>
            <th scope="col">End Time</th>
            <th scope="col">Work</th>
            <th scope="col">Action</th>
            </thead>       
        
        <tbody>
            <?php
                while ($teacherInfo = ($teacherSqlRun) -> fetch_assoc()) {
                    $tscheduleId = $teacherInfo['tsid'];
                    $tstime = $teacherInfo['tstime'];
                    $scheduleRequestDuplicateSql = "SELECT teacher_schedule.teacher_schedule_id, teacher_schedule.start_time, schedule_request.teacher_schedule_id,schedule_request.student_id, schedule_request.status, schedule_request.appointmentDate  FROM schedule_request
                    JOIN teacher_schedule
                    ON schedule_request.teacher_schedule_id = teacher_schedule.teacher_schedule_id WHERE schedule_request.student_id='$uid' AND schedule_request.appointmentDate = '$date' AND teacher_schedule.start_time = '$tstime' AND (schedule_request.status='accept' OR schedule_request.status='pending')";
                    $scheduleRequestDuplicate = $conn->query($scheduleRequestDuplicateSql);
                    
                    if ($scheduleRequestDuplicate->num_rows >0) {
                        $show = 0;
                    }
                    else {
                        $show = 1;
                    }
                
                    


                   
                    echo "<tr>".
                    "<td style='display:none'>".$tscheduleId."</td>".
                    "<td style='display:none'>".$date."</td>".
                    "<td>".$teacherInfo['tstime']."</td>".
                    " <td>".$teacherInfo['tetime']."</td>".
                    " <td>".$teacherInfo['twork']."</td>";
                    if ($teacherInfo['twork'] == "Consultation Hour" || $teacherInfo['twork'] == "Research" ) {
                        if ($show == 1) {
                            echo "<td><a href='scheduleRequestForm.php?tsid=".$tscheduleId."&date=".$date."'><button type='button' class='btn btn-success'>Request Appointment</button></a></td>";

                        }
                        else echo "<td></td>";
                    }
                   
                    else echo "<td></td>";

                    echo "</tr>";
                  
                 }


            ?>

            
        </tbody>

    </table>

    
</body>
</html>





    
    
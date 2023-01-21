<?php

    session_start();
    include('connect.php');

    $sri = $_GET['sri'];
    $uid = $_SESSION['user_id'];


    
    $sqlNotification = "SELECT * FROM schedule_request
    WHERE schedule_request_id = '$sri' ";
    $resultNotification = $conn->query($sqlNotification)->fetch_assoc();
    $studentId = $resultNotification['student_id'];
    $teacherScheduleId = $resultNotification['teacher_schedule_id'];

    $sqlNotificationUpload = "INSERT INTO notification_db (schedule_request_id, teacher_schedule_id, user_id) 
        VALUES ('$sri', '$teacherScheduleId', '$studentId')";
    $NotificationUpload = $conn->query($sqlNotificationUpload);

    $sql = "UPDATE schedule_request
            SET status = 'rejected'
            WHERE schedule_request_id = '$sri'";

    $result = $conn->query($sql);





        
    $teacherInfoSql = "SELECT * FROM user WHERE user_id = '$uid' ";
    $teacherInfo = $conn->query($teacherInfoSql)->fetch_assoc();
    $teacherName = $teacherInfo['name'];

    $scheduleFetchSql = "SELECT * FROM teacher_schedule WHERE teacher_schedule_id = '$teacherScheduleId' ";
    $scheduleFetch = $conn->query($scheduleFetchSql)->fetch_assoc();
    $weekDay = $scheduleFetch['weekday'];
    $startTime = $scheduleFetch['start_time'];


    $studentInfoFetch = "SELECT * FROM user WHERE user_id = '$studentId' ";
    $studentInfo = $conn->query($studentInfoFetch)->fetch_assoc();
    $studentEmail = $studentInfo['email'];



    $subject = "Schedule Request Rejected! -SCMS";


                
    $message = "<h1>SCMS</h1> <br><h3>Sorry!</h3> Your request to <b>Mr. ".$teacherName."</b>, has been <b style='color:red'>rejected!</b> schedule time was <b>".$weekDay."</b> at <b>".$startTime."</b> for <b>".$timeNeeded."</b> min about <b>".$topic."</b>";

    $message.= '<br>To see detail click the button below<br> <a href="
    " style="background-color:red;border:none;color:white;margin:auto;padding:8px 16px;text-align:center;text-decoration:none;display:inline-block;font-size:14px;border-radius:4px;">Open SCMS</a>';


    $header = "From:mahbub4248@gmail.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail ($studentEmail,$subject,$message,$header);






    echo "<script>alert('Requested Rejected!')</script>";

    header( "refresh:0; url=teacherIndex.php" );

    $conn->close();



?>
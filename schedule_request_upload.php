<?php


session_start();
include('connect.php');
$uid = $_SESSION['user_id'];
$tsid = $_POST['tsid'];
$topic = $_POST['topic'];
$timeNeeded = $_POST['timeNeeded'];
$groupMember = $_POST['groupMember'];
$rstudent = $_POST['rstudent'];
$appointmentDate = $_POST['date'];




date_default_timezone_set("Asia/Dhaka");
$dateTime= date("Y-m-d h:i:sa");

// echo $appointmentDate;

$sql = "INSERT INTO schedule_request(teacher_schedule_id, student_id, request_time, status,        topic, timeNeeded, groupMember, isResearch, appointmentDate)
        VALUES ('$tsid', '$uid', '$dateTime', 'pending', '$topic','$timeNeeded','$groupMember','$rstudent', '$appointmentDate')";


if ($conn->query($sql)===TRUE) {
    echo "<script>alert('Request sent successfully.')</script>";

}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$teacherIdFetchSql = "SELECT * FROM teacher_schedule WHERE teacher_schedule_id = '$tsid'";
$teacherIdFetch = $conn->query($teacherIdFetchSql)->fetch_assoc();
$teacherId = $teacherIdFetch['teacher_id'];
$weekDay = $teacherIdFetch['weekday'];
$startTime = $teacherIdFetch['start_time'];

$teacherInfoSql = "SELECT * FROM user WHERE user_id = '$teacherId' ";
$teacherInfo = $conn->query($teacherInfoSql)->fetch_assoc();
$teacherEmail = $teacherInfo['email'];

$studentInfoSql = "SELECT * FROM user WHERE user_id = '$uid' ";
$studentInfo = $conn->query($studentInfoSql)->fetch_assoc();
$studentName = $studentInfo['name'];


 


    $subject = "New Schedule Request From SCMS";
            
    $message = "<h1>SCMS</h1>You have got a new schedule request from <b>".$studentName."</b>, schedule time is <b>".$appointmentDate."</b> at <b>".$startTime."</b> for <b>".$timeNeeded."</b> min about <b>".$topic."</b>";

    $message.= '<br>To accept or reject request click the button below<br> <a href="http://localhost/scms/requestedSchedule.php" style="background-color:red;border:none;color:white;margin:auto;padding:8px 16px;text-align:center;text-decoration:none;display:inline-block;font-size:14px;border-radius:4px;">Open SCMS</a>';
   

    $header = "From:mahbub4248@gmail.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail ($teacherEmail,$subject,$message,$header);







header( "refresh:0; url=studentIndex.php" );



$conn -> close();



?>
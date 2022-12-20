<?php

session_start();
include('connect.php');

$sri = $_GET['sri'];


$sqlNotification = "SELECT * FROM schedule_request
                    WHERE schedule_request_id = '$sri' ";
$resultNotification = $conn->query($sqlNotification)->fetch_assoc();
$studentId = $resultNotification['student_id'];
$teacherScheduleId = $resultNotification['teacher_schedule_id'];

$sqlNotificationUpload = "INSERT INTO notification_db (schedule_request_id, teacher_schedule_id, user_id) 
                          VALUES ('$sri', '$teacherScheduleId', '$studentId')";
$NotificationUpload = $conn->query($sqlNotificationUpload);


$sql = "UPDATE schedule_request
        SET status = 'accept'
        WHERE schedule_request_id = '$sri'";

$result = $conn->query($sql);

echo "<script>alert('Requested Accepted!')</script>";


header( "refresh:0; url=teacherIndex.php" );

$conn->close();



?>
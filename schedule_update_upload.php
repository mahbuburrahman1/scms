<?php
include('connect.php');

$srid = $_POST['srid'];
$tsid = $_POST['tsid'];
$date = $_POST['date'];
$weekday = $_POST['weekday'];
$stime = $_POST['time'];

$teacher_fetch_sql = "SELECT * FROM teacher_schedule WHERE teacher_schedule_id = '$tsid' ";
$teacher_id_fetch = $conn->query($teacher_fetch_sql);
$teacher_id = $teacher_id_fetch->fetch_assoc()['teacher_id'];

// echo $teacher_id;

$new_tsid_fetch = "SELECT * FROM teacher_schedule WHERE teacher_id = '$teacher_id' AND weekday='$weekday' AND start_time='$stime' ";
$new_tsid = $conn->query($new_tsid_fetch)->fetch_assoc()['teacher_schedule_id'];


$sql ="UPDATE schedule_request SET teacher_schedule_id = '$new_tsid', appointmentDate = '$date' WHERE schedule_request_id = '$srid' ";

$conn->query($sql);
header("Location: dashboardTeacher.php");


?>
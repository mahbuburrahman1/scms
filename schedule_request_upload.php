<?php


session_start();
include('connect.php');
$uid = $_SESSION['user_id'];
$tsid = $_GET['tsid'];

date_default_timezone_set("Asia/Dhaka");
$dateTime= date("Y-m-d h:i:sa");

$sql = "INSERT INTO schedule_request(teacher_schedule_id, student_id, request_time, status)
        VALUES ('$tsid', '$uid', '$dateTime', 'pending')";


if ($conn->query($sql)===TRUE) {
    echo "<script>alert('Request sent successfully.')</script>";

}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

header( "refresh:0; url=studentIndex.php" );



$conn -> close();



?>
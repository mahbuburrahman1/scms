<?php
session_start();
include('connect.php');


$tsid = $_POST['tsid'];
$twork = $_POST['twork'];



$updateSql = "UPDATE teacher_schedule 
            SET work = '$twork'
            WHERE teacher_schedule_id = '$tsid'";
$conn->query($updateSql);

echo "<script>alert(Update Successful!)</script>";

header("Location: teacherIndex.php");



?>
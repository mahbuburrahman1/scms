<?php
session_start();
include('connect.php');
$uid = $_SESSION['user_id'];

$userFetchSql = "SELECT * FROM user 
                WHERE user_id = '$uid'";
$userInfo = ($conn->query($userFetchSql))->fetch_assoc();

$role = $userInfo['role'];

if ($role == 'student') {
    header("Location: studentIndex.php");
}
else if ($role == 'teacher') {
    header("Location: teacherIndex.php");
}
else {
    echo "<script>Adminstrative</script>";
}

?>
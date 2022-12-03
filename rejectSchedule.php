<?php

    session_start();
    include('connect.php');

    $sri = $_GET['sri'];

    $sql = "UPDATE schedule_request
            SET status = 'rejected'
            WHERE schedule_request_id = '$sri'";

    $result = $conn->query($sql);

    echo "<script>alert('Requested Rejected!')</script>";

    header( "refresh:0; url=teacherIndex.php" );

    $conn->close();



?>
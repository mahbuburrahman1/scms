<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>



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

?>

<div class="container text-center rounded mt-5">

<a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>
<br>
    <h3>Notification Panel</h3>

    <?php
        $notificationSql = "SELECT * FROM notification_db WHERE user_id = '$uid'
                            ORDER BY time DESC LIMIT 5";
        $notificationFetch = $conn->query($notificationSql);
    ?>
    <br>
    <br>

        <table class = "table table-bordered">
            

            <tbody>

            <?php
                while ($notificationFetchRow = $notificationFetch->fetch_assoc()) {

                    $teacherSchId = $notificationFetchRow['teacher_schedule_id'];

                    $rstatussql = "SELECT * FROM schedule_request
                                    WHERE schedule_request_id = '$notificationFetchRow[schedule_request_id]' ";
                    $rstatusFetch = $conn->query($rstatussql)->fetch_assoc();

                    $tnamesql = "SELECT user.user_id, user.name as tname, teacher_schedule.teacher_schedule_id, teacher_schedule.teacher_id FROM teacher_schedule
                    JOIN user ON teacher_schedule.teacher_id = user.user_id
                    WHERE teacher_schedule.teacher_schedule_id = '$teacherSchId' ";

                    $tnamesqlFetch = $conn->query($tnamesql)->fetch_assoc();

                    

                    
                   
                    

                    if ($rstatusFetch['status'] == 'accept') {
                      
                        echo "<tr>".
                        "<td>".$notificationFetchRow['time']." </td>".
                        "<td class='text-success'>Congratulation! Your appointment request to <b>".$tnamesqlFetch['tname']."</b> is<b> Accepted</b>.</td>".
                          
                       " </tr>";

                    }
                    if ($rstatusFetch['status'] == 'rejected') {
                        
                        echo "<tr>".
                        "<td>".$notificationFetchRow['time']." </td>".
                        "<td class='text-danger'>Sorry! Your appointment request to <b>".$tnamesqlFetch['tname']."</b> is<b> Rejected</b>.</td>".
                          
                       " </tr>";

                    }



                }

                

            ?>

            </tbody>
        
        
        </table>




</div>







</body>
</html>
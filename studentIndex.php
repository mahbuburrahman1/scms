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




<div class= "container text-center rounded mt-5">
<a class="btn btn-warning text-white float-start" href="notification.php" role="button">Notification</a>
<a class="btn btn-warning text-white mx-2 float-start" href="dashboardStudent.php" role="button">Dashboard</a>
<a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>
<br>

    <h3>Hello <?php echo $_SESSION['uname']?>, Wellcome to homepage!</h3>

    <?php 
    

        $teacherFetchSql = "SELECT * FROM user 
                            where role = 'teacher'";
        $teacherFetch = $conn -> query ($teacherFetchSql);
        
        
        
        ?>
        <table class = "table table-bordered">
            <thead>
            
            <th scope="col">Teacher Name</th>
            <th scope="col">Teacher Designation</th>
            <th scope="col">Teacher Room</th>
            </thead>

            <tbody>

            <?php
                while ($teacherRow = $teacherFetch->fetch_assoc()) {
                echo "<tr>".
                        
                        "<td><a href='teacher_schedule_show.php?tid=".$teacherRow['user_id']."'>".$teacherRow['name']."</a></td>".
                       " <td>".$teacherRow['designation']."</td>".
                       " <td>".$teacherRow['room']."</td>".
                   " </tr>";

                }

                

            ?>

            </tbody>
        
        
        </table>
    <?php

    

    ?>

    
</div>


</body>
</html>
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
$teacher_id = $_GET['tid'];

$_SESSION['teacher_id'] = $teacher_id;



$tnamesql = "SELECT name FROM user 
            where user_id = '$teacher_id'";
$tname = ($conn->query($tnamesql))->fetch_assoc();


?>




<div class= "container clearfix text-center rounded mt-5">
    <a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>

</div>
    <br>
    <br>
    <div class="container">
     <h1 style="text-align: center;">Schedule of <?php echo $tname['name'] ?></h1>
     <br>
     <label for="sweekday">Select Weekday</label>
        <select id ="sweekday" name="sweekday" class=" form-select" onchange="showSchedule(this.value)">
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
        </select>
        <br>


        <div id = "trowshow">

        </div>

    </div>


    <script>

        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        var d = new Date();
        var dayName = days[d.getDay()];

        document.getElementById("sweekday").value = dayName;
        showSchedule(dayName);




        function showSchedule(day) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("trowshow").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "fetchScheduleForStudent.php?day=" + day, true);
            xmlhttp.send();
        
        }
    </script>
    

</body>
</html>
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
     <!-- <label for="sweekday">Select Weekday</label>
        <select id ="sweekday" name="sweekday" class=" form-select" onchange="showSchedule(this.value)">
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
        </select>
        <br> -->

        <div class="row">
            <div class="col-3">
                <div class="input-group date" id="datepicker">
                    <label for="calendarInput">Select a date: </label>
                    <input type="date" class="form-control mx-2" id="calendarInput" onchange="changeWeekDay(this.value)">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-3">
                <input type="text" class="form-control mx-2" id="sweekday" >
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row my-5">

            <div id = "trowshow">

            </div>

        </div>






    </div>


    <script>



   
        var d = new Date();
        // console.log(d);
         document.getElementById('calendarInput').valueAsDate = d;
        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        
        var dayName = days[d.getDay()];

        document.getElementById("sweekday").value = dayName;
        
            var year = d.getFullYear();
            var month = d.getMonth() + 1;
            var day = d.getDate();

            // Add a leading zero to the month and day if necessary
            if (month < 10) {
            month = `0${month}`;
            }
            if (day < 10) {
            day = `0${day}`;
            }

            var formattedDate = `${year}-${month}-${day}`;
            showSchedule(dayName,formattedDate);


        function changeWeekDay(selectedDate) {
            
            var date = new Date(selectedDate);
            var day = date.getDay();
            console.log(selectedDate);
            var weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var weekday = weekdays[day];

            document.getElementById("sweekday").value = weekday;
            showSchedule(weekday,selectedDate);
            
        }




        function showSchedule(day,input) {

            

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("trowshow").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "fetchScheduleForStudent.php?day="+day+"&date="+input, true);
            xmlhttp.send();
        
        }

   
    </script>


  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    

</body>
</html>
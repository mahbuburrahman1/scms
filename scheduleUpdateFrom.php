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

$srid = $_GET['srid'];
$tsid = $_GET['tsid'];





?>




        <div class= "container clearfix text-center rounded mt-5">
            <a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>

        </div>
            <br>
            <br>
            <div class="container">
            
            <form action="schedule_update_upload.php" method = "post" class="mt-2 mb-3" >
            <input type="hidden" id="srid" name="srid" value="<?php echo $srid ?>">
            <input type="hidden" id="tsid" name="tsid" value="<?php echo $tsid ?>">
            <div id = "date" class="form-group pb-3">
                <div class="date" id="datepicker">
                    <label for="calendarInput">Date</label>
                    <input name="date" type="date" class="form-control" id="calendarInput" onchange="changeWeekDay(this.value)">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
            </div>

           





           
            <div  class="form-group pb-3">
                <label for="weekday">Weekday</label>
                <input name="weekday" type="text" class="form-control" id="weekday" >
            </div>

            <div class="form-group pb-3">
                    <label for="time">Time</label>
                    <select name="time" class="form-select" id ="time">
                        <option value="09:00:00">09:00:00 - 10:00:00</option>
                        <option value="10:00:00">10:00:00 - 11:00:00</option>
                        <option value="11:00:00">11:00:00 - 12:00:00</option>
                        <option value="12:00:00">12:00:00 - 01:00:00</option>
                        <option value="01:00:00">01:00:00 - 02:00:00</option>
                        <option value="02:00:00">02:00:00 - 03:00:00</option>
                        <option value="03:00:00">03:00:00 - 04:00:00</option>
                       
                    </select>
                </div>
                

                
     
                
                <input type="submit" class="btn btn-primary" name="submit"/>
            </form> 
     

    </div> 


    
    <script>



   


        function changeWeekDay(selectedDate) {
            
            var date = new Date(selectedDate);
            var day = date.getDay();
            console.log(selectedDate);
            var weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var weekday = weekdays[day];
            console.log(weekday);
            document.getElementById("weekday").value = weekday;
            
        }



   
    </script>



    
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
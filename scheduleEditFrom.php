<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php
    session_start();
    include('navbar.php'); 
    include('connect.php');
    $tsid = $_GET['tsid'];

    $sql = "SELECT * FROM teacher_schedule
            WHERE teacher_schedule_id = '$tsid'";
    $row = ($conn->query($sql))->fetch_assoc();


    ?>
    <div class= "container clearfix text-center rounded mt-5">
    <a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>
    <br>
    <h1>Edit Schedule</h1>
    
    </div>

    <div class="container">
        <form action="scheduleUpdate.php" method = "post">
        <input type="hidden" id="tsid" name="tsid" value="<?php echo $row['teacher_schedule_id']?>">
            <div class="form-group">
                <label for="weekday">Weekday</label>
                <input type="text" class="form-control" value="<?php echo $row['weekday']?>" disabled >
            </div>
            <div class="form-group">
                <label for="stime">Start Time</label>
                <input type="text" class="form-control" value="<?php echo $row['start_time']?>" disabled>
            </div>
            <div class="form-group">
                <label for="etime">End Time</label>
                <input type="text" class="form-control" value="<?php echo $row['end_time']?>" disabled>
            </div>
            <div class="form-group">
                <label for="twork">Work</label>
                <select name="twork" class="form-select">
                    <option value="Class">Class</option>
                    <option value="Meeting">Meeting</option>
                    <option value="Research">Research</option>
                    <option value="Consultation Hour">Consultation Hour</option>
                </select>
            </div>
            <br>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
    
</body>
</html>
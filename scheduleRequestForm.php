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

$teacher_id = $_SESSION['teacher_id'];
$tsid = $_GET['tsid'];
$date = $_GET['date'];







$tnamesql = "SELECT name FROM user 
            where user_id = '$teacher_id'";
$tname = ($conn->query($tnamesql))->fetch_assoc();


$totalTime = 0;
$timesql = "SELECT * FROM schedule_request WHERE teacher_schedule_id = '$tsid' AND appointmentDate = '$date' AND status = 'accept'";
$time=$conn->query($timesql);
while ($row = $time->fetch_assoc()) {

    $totalTime = $totalTime + $row['timeNeeded'];

}
// echo $totalTime;


?>




 <div class= "container clearfix text-center rounded mt-5">
    <a class="btn btn-danger float-end" href="logout.php" role="button">Log Out</a>

</div>
    <br>
    <br>
    <div class="container">
     <h1 style="text-align: center;">Request Schedule to <?php echo $tname['name'] ?></h1>
     <br>

     <form action="schedule_request_upload.php" method = "post" class="mt-2 mb-3" >

     <div  class="form-group pb-3">
        <label for="date">Selected Date</label>
        <input class="form-control" type="date" name="date" value="<?php echo $date ?>" readonly>


     </div>




     <input type="hidden" id="tsid" name="tsid" value="<?php echo $tsid ?>">
                <div class="form-group pb-3">
                    <label for="topic">Topic</label>
                    <input name="topic" type="text" class="form-control" id="topic"  placeholder="Write topic">
                </div>

                <div  class="form-group pb-3">
                    <label for="timeNeeded">Time Needed</label>
                    <select id ="timeNeeded" name="timeNeeded" class="form-select">
                        <option selected >Select Time you need</option>
                        <?php
                            for($i=10; $i<=60-$totalTime; $i=$i+10) {
                                ?>
                                <option value="<?php echo $i?>"><?php echo $i?> Min</option>
                         <?php
                            }
                            ?>
                    </select>
                </div>


                <div class="form-group pb-3">
                    <label for="groupMember">Number of Group Member</label>
                    <input name= "groupMember" type="text" class="form-control" id="groupMember"  placeholder="Number of group member">
                </div>
                <div id = "studentSession" class="form-group pb-3">
                    <label for="rstudent">Research Student?</label>
                    <select name="rstudent" class="form-select" id ="rstudent">
                        <option selected >select option</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                
                <input type="submit" class="btn btn-primary" name="submit"/>
            </form> 
     

    </div> 

    

</body>
</html>
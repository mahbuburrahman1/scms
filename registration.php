<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<?php 
include('navbar.php'); 
include('connect.php');


?>


    <div class="container p-3">

        <div class=" bg-light w-75 mx-auto p-5 rounded mt-5 mb-5">
        <h2 class="text-center mb-3">Registration</h2>
            <form action="registrationformup.php" method = "post" class="mt-2 mb-3" >
                <div class="form-group pb-3">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name"  placeholder="Enter name">
                </div>

                <div  class="form-group pb-3">
                    <label for="urole">Role</label>
                    <select id ="urole" name="urole" class="form-select" onchange="roleSelection()">
                        <option selected >Select Your Role</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                       
                    </select>
                </div>


                <div id = "studentRoll" class="form-group pb-3" style="display:none">
                    <label for="sroll">Student Roll</label>
                    <input name= "sroll" type="text" class="form-control" id="sroll"  placeholder="Enter Student Roll">
                </div>
                <div id = "studentSession" class="form-group pb-3" style="display:none">
                    <label for="ssession">Student Session</label>
                    <select name="ssession" class="form-select" id ="ssession">
                        <option selected >Select Student Session</option>
                        <option value="2017-18">2017-18</option>
                        <option value="2018-19">2018-19</option>
                        <option value="2019-20">2019-20</option>
                        <option value="2020-21">2020-21</option>
                    </select>
                </div>


                <div id = "teacherDesignation" class="form-group pb-3" style="display:none">
                    <label for="tdesignation">Teacher Designation</label>
                    <select id ="tdesignation" name="tdesignation" class="form-select">
                        <option selected >Select Designation</option>
                        <option value="lecturer">Lecturer</option>
                        <option value="assitantProf">Assitant Professor</option>
                        <option value="associateProf">Associate Professor</option>
                        <option value="prof">Professor</option>
                        <option value="gTeacher">Guest Teacher</option>

                    </select>
                </div>
                <div id = "teacherRoom" class="form-group pb-3" style="display:none">
                    <label for="troom">Teacher Room</label>
                    <input name= "troom" type="text" class="form-control" id="troom"  placeholder="Teacher Room">
                </div>






                <div class="form-group pb-3">
                    <label for="email">Email</label>
                    <input name = "email" type="email" class="form-control" id="email"  placeholder="Enter email">
                </div>
                <div class="form-group pb-3">
                    <label for="pass">Password</label>
                    <input name = "password" type="password" class="form-control" id="pass" placeholder="Password">
                </div>
            
                
                <input type="submit" class="btn btn-primary" name="submit"/>
            </form> 

            
            

        </div>



    </div>






    

    <script>
        function roleSelection() {
            var role = document.getElementById("urole").value;

            
            if (role == "student") {
                document.getElementById("studentRoll").style.display = "block";
                document.getElementById("studentSession").style.display = "block";
                document.getElementById("teacherDesignation").style.display = "none";
                document.getElementById("tdesignation").value = "null";
                document.getElementById("teacherRoom").style.display = "none";
            }
            if (role == "teacher") {
                document.getElementById("studentRoll").style.display = "none";
                document.getElementById("studentSession").style.display = "none";
                document.getElementById("ssession").value = "null";
                document.getElementById("teacherDesignation").style.display = "block";
                document.getElementById("teacherRoom").style.display = "block";
            }
            
        }
    </script>
 
    
</body>


</html>


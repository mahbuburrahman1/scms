   
<?php
 //check if form was submitted
 include('connect.php');


  $name = $_POST['name'];
  $role = $_POST['urole'];
  $roll = $_POST['sroll'];
  $session = $_POST['ssession'];
  $designation = $_POST['tdesignation'];
  $room = $_POST['troom'];
  $email = $_POST['email'];
  $password = $_POST['password'];




    $registrationSql = "INSERT INTO user (name, roll, session, designation, room, email, password, role)
                            VALUES ('$name', '$roll', '$session', '$designation', '$room', '$email', '$password', '$role')";

        

        if ($conn->query($registrationSql)===TRUE) {
            echo "Successful";

        }
        else {
            echo "Error: " . $registrationSql . "<br>" . $conn->error;

        }


        header("Location: login.php");


    $conn -> close();
 
?>
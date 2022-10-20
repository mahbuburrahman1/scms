   
<?php
 //check if form was submitted
 session_start();
 include('connect.php');


  $name = $_POST['name'];
  $role = $_POST['urole'];
  $roll = $_POST['sroll'];
  $session = $_POST['ssession'];
  $designation = $_POST['tdesignation'];
  $room = $_POST['troom'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $_SESSION['email'] = $email;




    $registrationSql = "INSERT INTO user (name, roll, session, designation, room, email, password, role)
                            VALUES ('$name', '$roll', '$session', '$designation', '$room', '$email', '$password', '$role')";

        

        if ($conn->query($registrationSql)===TRUE) {
            echo "Successful";

        }
        else {
            echo "Error: " . $registrationSql . "<br>" . $conn->error;

        }


        header("Location: emailverification.php");


    $conn -> close();
 
?>
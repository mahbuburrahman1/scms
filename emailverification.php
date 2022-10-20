<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php 
session_start();
include('navbar.php'); 
include('connect.php');

$email = $_SESSION['email'];


?>
  <div class="container p-3 mx-auto text-center">
    <h1 class="m-5">You are not verified yet. Please verify first. Your Email is <?php echo $email?></h1>
    <a href="emailverificationup.php"><button type="button" class="btn btn-success m-5 p-3">Send Verification Email</button></a>

  </div>


 
    
</body>


</html>


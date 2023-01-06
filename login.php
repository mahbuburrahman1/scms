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
    <?php include('navbar.php'); ?>


    <div class="container">

        <div class=" bg-light w-75 mx-auto p-5 rounded mt-5">
            <h2 class="text-center mb-3">Login</h2>
            <form class="mt-2 mb-3" action="auth.php" method= "post">
            <div class="form-group pb-3">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email"  placeholder="Enter email">
            </div>
            <div class="form-group pb-3">
                <label for="pass">Password</label>
                <input name= "password" type="password" class="form-control" id="pass" placeholder="Enter Password">
            </div>
            
                <button type="Login" class="btn btn-primary">Login</button>
            </form> 
            
            <span >Don't have an account? <a href="registration.php">Create account</a></span>

        </div>



    </div>

</body>
</html>
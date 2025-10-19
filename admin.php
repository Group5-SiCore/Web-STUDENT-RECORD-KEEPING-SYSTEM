<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <title>Document</title>
    <body class="background" style="background-image: url('2.jpg');">

   <style>
        .background {
            background-size: 100%;
            background-repeat: no-repeat;
        }
    </style>
</head>

</head>

</style>
<body class="bg-light">
    <div class="row justify-content-center align-items-center text-center" style="margin-top:10%;">
        <div class="col-4 bg-dark rounded">
            <div class="lead text-center p-3">ADMIN LOGIN</div>

         <form action='dashboard.php' method="post">
                <input class="form-control form-control-md rounded mb-3" type="text" placeholder="Username" name="txtusername" required>

                <input class="form-control form-control-md rounded mb-3" type="password" placeholder="Password" name="txtpassword" required>
            <div>
                <input type="submit" class="btn btn-primary mb-5" value="Login"> 
                
                <?php if (isset($_SESSION['msg'])) {?>
                        <p class="text-danger text-center mt-2">Invalid Username or Password</p>
                        <?php
                        }
                        unset($_SESSION['msg']);
                        ?>
</body>
</html>
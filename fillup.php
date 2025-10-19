<?php
 include("conn.php");
 if(isset($_POST["create"])){
   $studentid=  $_POST['studentid'];
    $fname =  $_POST['fname'];
    $middlename = $_POST['middlename'];
    $lname = $_POST['lname'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $phonenumber  =  $_POST['phonenumber'];
    $statuss =  $_POST['statuss'];
    $birthday = $_POST['birthday'];

    $sql = "INSERT INTO `tb_sturecord`(`studentid`, `fname`, `middlename`, `lname`, `gender`, `email`, `phonenumber`, `statuss`, `birthday`)
     VALUES (NULL,'$fname', '$middlename', '$lname', '$gender', '$email', '$phonenumber',  '$statuss', '$birthday')";

     $result=mysqli_query($conn,$sql);
     if($result){
      header("location:table.php?msg= New data created successfully");
     }
     else{
      echo"faild".mysqli_error($conn);
     }
   }

   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <title>Add New Student</title>
</head>
<body>
<body class="background"background="2.jpg"></body>

<style>

    .background{
        background-size: 100%;
        background-repeat:no-repeat;
       
    }
</style>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
           <h1> ADD STUDENT RECORD</h1>
            <div>
                <a href="table.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="fillup.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="fname" placeholder="First Name"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="middlename" placeholder="Middle Name"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="lname" placeholder="Last Name"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="gender" placeholder="gender"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="email" placeholder="Email"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="phonenumber" placeholder="phonenumber"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="statuss" placeholder="statuss"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="birthday" placeholder="Birthday"> 
            </div>
            <div class="form-element">
                <input type="submit" class="btn btn-success" name="create" value="Add Student">
        

            </div>
        </form>
       
    </div>
</body>
</html>

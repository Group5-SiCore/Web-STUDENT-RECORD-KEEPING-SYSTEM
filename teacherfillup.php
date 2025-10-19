<?php
 include("conn.php");
 if(isset($_POST["create"])){
   $teacher_id=  $_POST['teacher_id'];
    $fname =  $_POST['fname'];
    $middlename = $_POST['middlename'];
    $lname = $_POST['lname'];
    $age= $_POST['age'];
    $gender= $_POST['gender'];
  
    $sql = "INSERT INTO `tb_teacher`(`teacher_id`, `fname`, `middlename`, `lname`, `age`, `gender`)
     VALUES (NULL,'$fname', '$middlename', '$lname',' $age', '$gender','$birthday')";

     $result=mysqli_query($conn,$sql);
     if($result){
      header("location:teachtable.php?msg= New data created successfully");
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
    <title></title>
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
           <h1> Teachers Info</h1>
            <div>
                <a href="teachtable.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="teacherfillup.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="fname" placeholder="First Name"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="middlename" placeholder="Middle Name"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="lname" placeholder="Last Name"> 
                <div class="form-element my-4">
                <input type="text" class="form-control" name="age" placeholder="Age"> 
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="gender" placeholder="Gender"> 
            </div>
           
            <div class="form-element">
            <input type="submit" class="btn btn-success" name="create" value="Add ">
              
        

            </div>
        </form>
       
    </div>
</body>
</html>

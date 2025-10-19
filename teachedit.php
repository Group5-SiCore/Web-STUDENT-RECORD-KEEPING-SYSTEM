<?php
include("conn.php");

if(isset($_POST['edit'])){
    // Retrieve form data and sanitize
   
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  
    $teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']); // Added missing teacher_id

    // Update SQL query with prepared statement
    $sql = "UPDATE `tb_teacher` SET `firstname`=?, `middlename`=?, `lastname`=?, `age`=?, `gender`=? WHERE `teacher_id`=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssissi", $firstname, $middlename, $lastname, $age, $gender, $teacher_id); // Fixed binding parameters syntax
    
    // Execute statement
    $result = mysqli_stmt_execute($stmt);
    
    if($result){
        header("location: teachtable.php?msg=record updated successfully"); // Fixed link to teachtable.php
        exit();
    } else {
        echo "Failed to update record: " . mysqli_error($conn);
    }
}

// Fetch the record to be edited based on 'teacher_id'
$teacher_id = $_GET['teacher_id']; // Fixed variable name
$sql = "SELECT * FROM `tb_teacher` WHERE `teacher_id`='$teacher_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <title>Edit Subject</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Update subject</h1>
        <div>
            <a href="teachtable.php" class="btn btn-primary">Back</a> <!-- Fixed link to teachtable.php -->
        </div>
    </header>

    <form action="" method="post">
        <input type="hidden" name="teacher_id" value="<?php echo $row['teacher_id']; ?>"> <!-- Changed registration_subject_id to teacher_id -->
        <div class="form-element my-4">
            <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="First Name"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="Middle Name"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Last Name"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>" placeholder="Age"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>" placeholder="Gender"> <!-- Fixed placeholder text -->
        </div>
       
        
        <div class="form-element">
            <input type="submit" class="btn btn-success" name="edit" value="Update">
        </div>
    </form>
</div>
</body>
</html>

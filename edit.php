<?php
include("conn.php");

if(isset($_POST['edit'])){
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $statuss = $_POST['statuss'];
    $birthday = $_POST['birthday'];
    $student_id = $_POST['student_id']; 

    // Update SQL query with prepared statement
    $sql = "UPDATE `tb_student` SET `firstname`=?, `middlename`=?, `lastname`=?, `gender`=?, `email`=?, `phone_number`=?, `statuss`=?, `birthday`=? WHERE `student_id`=?";    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssissis", $firstname, $middlename, $lastname, $gender, $email, $phone_number, $statuss, $birthday, $student_id);
    
    // Execute statement
    $result = mysqli_stmt_execute($stmt);
    
    if($result){
        header("location: table.php?msg=record updated successfully"); 
        exit();
    } else {
        echo "Failed to update record: " . mysqli_error($conn);
    }
}

// Fetch the record to be edited based on 'student_id'
$student_id = $_GET['student_id']; 
$sql = "SELECT * FROM `tb_student` WHERE `student_id`=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $student_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <title>Edit Student</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Update student</h1>
        <div>
            <a href="table.php" class="btn btn-primary">Back</a> <!-- Corrected link to table.php -->
        </div>
    </header>

    <form action="" method="post">
        <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>"> 
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
            <input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>" placeholder="Gender"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="Email"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="phone_number" value="<?php echo $row['phone_number']; ?>" placeholder="Phone Number"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="statuss" value="<?php echo $row['statuss']; ?>" placeholder="Status"> 
        </div>
        <div class="form-element my-4">
    <input type="date" class="form-control" name="birthday" value="<?php echo date('Y-m-d', strtotime($row['birthday'])); ?>">
</div>

        
        <div class="form-element">
            <input type="submit" class="btn btn-success" name="edit" value="Update">
        </div>
    </form>
</div>
</body>
</html>

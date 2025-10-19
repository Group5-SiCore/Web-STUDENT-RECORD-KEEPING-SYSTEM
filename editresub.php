<?php
include("conn.php");

if(isset($_POST['edit'])){
    // Retrieve form data and sanitize
    $registration_id = mysqli_real_escape_string($conn, $_POST['registration_id']);
    $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
    $teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);
    $day = mysqli_real_escape_string($conn, $_POST['day']);
    $time_start = mysqli_real_escape_string($conn, $_POST['time_start']);
    $time_end = mysqli_real_escape_string($conn, $_POST['time_end']);

    // Update SQL query with prepared statement
    $sql = "UPDATE `tb_registration_subject` SET `registration_id`=?, `subject_id`=?, `teacher_id`=?, `day`=?, `time_start`=?, `time_end`=? WHERE `registration_subject_id`=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssi", $registration_id, $subject_id, $teacher_id, $day, $time_start, $time_end, $_POST['registration_subject_id']);
    
    // Execute statement
    $result = mysqli_stmt_execute($stmt);
    
    if($result){
        header("location: resub.php?msg=record updated successfully");
        exit();
    } else {
        echo "Failed to update record: " . mysqli_error($conn);
    }
}

// Fetch the record to be edited based on 'teacher_id'
$registration_subject_id = $_GET['registration_subject_id']; 
$sql = "SELECT * FROM `tb_registration_subject` WHERE `registration_subject_id`='$registration_subject_id'";
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
            <a href="resub.php" class="btn btn-primary">Back</a>
        </div>
    </header>

    <form action="" method="post">
        <input type="hidden" name="registration_subject_id" value="<?php echo $row['registration_subject_id']; ?>">
        <div class="form-element my-4">
            <input type="text" class="form-control" name="registration_id" value="<?php echo $row['registration_id']; ?>" placeholder="Registration ID"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="subject_id" value="<?php echo $row['subject_id']; ?>" placeholder="Subject ID"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="teacher_id" value="<?php echo $row['teacher_id']; ?>" placeholder="Teacher ID"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="day" value="<?php echo $row['day']; ?>" placeholder="day"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="time_start" value="<?php echo $row['time_start']; ?>" placeholder="Time Start"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="time_end" value="<?php echo $row['time_end']; ?>" placeholder="Time End"> 
        </div>
        
        <div class="form-element">
            <input type="submit" class="btn btn-success" name="edit" value="Update">
        </div>
    </form>
</div>
</body>
</html>

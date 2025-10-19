<?php
include("conn.php");

if(isset($_POST['edit'])){
    // Retrieve form data and sanitize
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $subjectname = mysqli_real_escape_string($conn, $_POST['subjectname']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);
    $subid = mysqli_real_escape_string($conn, $_POST['subject_id']);

    // Update SQL query with prepared statement
    $sql = "UPDATE `tb_subject` SET `course_id`=?, `subjectname`=?, `unit`=? WHERE `subject_id`=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssi", $course_id, $subjectname, $unit, $subid);
    
    // Execute statement
    $result = mysqli_stmt_execute($stmt);
    
    if($result){
        header("location: subtable.php?msg=record updated successfully");
        exit();
    } else {
        echo "Failed to update record: " . mysqli_error($conn);
    }
}

// Fetch the record to be edited based on 'teacher_id'
$subject_id = $_GET['subject_id']; 
$sql = "SELECT * FROM `tb_subject` WHERE `subject_id`='$subject_id'";
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
            <a href="teachtable.php" class="btn btn-primary">Back</a>
        </div>
    </header>

    <form action="" method="post">
        <input type="hidden" name="subject_id" value="<?php echo $row['subject_id']; ?>">
        <div class="form-element my-4">
            <input type="text" class="form-control" name="course_id" value="<?php echo $row['course_id']; ?>" placeholder="Course ID"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="subjectname" value="<?php echo $row['subjectname']; ?>" placeholder="Subject Name"> 
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="unit" value="<?php echo $row['unit']; ?>" placeholder="Unit"> 
        </div>
        
        <div class="form-element">
            <input type="submit" class="btn btn-success" name="edit" value="Update">
        </div>
    </form>
</div>
</body>
</html>

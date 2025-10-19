<?php
include("conn.php");

// Update record if form submitted
if (isset($_POST['edit'])) {
    $registration_id = $_POST['registration_id'];
    $student_id = $_POST['student_id'];
    $fullname_student = $_POST['fullname_student'];
    $name_teacher = $_POST['name_teacher'];
    $subject_name = $_POST['subject_name'];
    $course = $_POST['course'];
    $school_year = $_POST['school_year'];
    $semester = $_POST['semester'];
    $year_level = $_POST['year_level'];
    $section = $_POST['section'];

    $sql = "UPDATE tb_registration 
            SET student_id=?, fullname_student=?, name_teacher=?, subject_name=?, 
                course=?, school_year=?, semester=?, year_level=?, section=? 
            WHERE registration_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssi", 
        $student_id, $fullname_student, $name_teacher, $subject_name, 
        $course, $school_year, $semester, $year_level, $section, $registration_id
    );
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("location: registrationtable.php?msg=Record updated successfully");
        exit();
    } else {
        echo "Failed to update record: " . mysqli_error($conn);
    }
}

// Fetch record for editing
$registration_id = $_GET['registration_id'];
$sql = "SELECT * FROM tb_registration WHERE registration_id = '$registration_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Fetch dropdown data
$students = mysqli_query($conn, "SELECT student_id, firstname, middlename, lastname FROM tb_student");
$teachers = mysqli_query($conn, "SELECT teacher_id, firstname, middlename, lastname FROM tb_teacher");
$subjects = mysqli_query($conn, "SELECT subject_id, subjectname FROM tb_subject");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registration</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
<div class="container mt-5">
    <header class="d-flex justify-content-between my-4">
        <h1>Edit Registration</h1>
        <a href="registrationtable.php" class="btn btn-primary">Back</a>
    </header>

    <form action="" method="post">
        <input type="hidden" name="registration_id" value="<?php echo $row['registration_id']; ?>">

        <!-- Student ID Dropdown -->
        <div class="form-element my-3">
            <label class="form-label">Student ID</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">Select Student ID</option>
                <?php 
                $studentData = [];
                while ($s = mysqli_fetch_assoc($students)) { 
                    $fullname = trim($s['firstname'] . ' ' . $s['middlename'] . ' ' . $s['lastname']);
                    $studentData[$s['student_id']] = $fullname;
                    $selected = ($s['student_id'] == $row['student_id']) ? 'selected' : '';
                    echo "<option value='{$s['student_id']}' $selected>{$s['student_id']}</option>";
                } 
                ?>
            </select>
        </div>

        <!-- Student Name (auto-filled) -->
        <div class="form-element my-3">
            <label class="form-label">Student Name</label>
            <input type="text" class="form-control" id="fullname_student" name="fullname_student" 
                value="<?php echo htmlspecialchars($row['fullname_student']); ?>" readonly required>
        </div>

        <!-- Teacher Dropdown -->
        <div class="form-element my-3">
            <label class="form-label">Teacher</label>
            <select name="name_teacher" class="form-control" required>
                <option value="">Select Teacher</option>
                <?php 
                while ($t = mysqli_fetch_assoc($teachers)) { 
                    $teacher_fullname = trim($t['firstname'] . ' ' . $t['middlename'] . ' ' . $t['lastname']);
                    $selected = ($teacher_fullname == $row['name_teacher']) ? 'selected' : '';
                    echo "<option value='$teacher_fullname' $selected>$teacher_fullname</option>";
                } 
                ?>
            </select>
        </div>

        <!-- Subject Dropdown -->
        <div class="form-element my-3">
            <label class="form-label">Subject</label>
            <select name="subject_name" class="form-control" required>
                <option value="">Select Subject</option>
                <?php 
                while ($sub = mysqli_fetch_assoc($subjects)) { 
                    $selected = ($sub['subjectname'] == $row['subject_name']) ? 'selected' : '';
                    echo "<option value='{$sub['subjectname']}' $selected>{$sub['subjectname']}</option>";
                } 
                ?>
            </select>
        </div>

        <!-- Other fields -->
        <div class="form-element my-3">
            <input type="text" class="form-control" name="course" value="<?php echo $row['course']; ?>" placeholder="Course" required>
        </div>
        <div class="form-element my-3">
            <input type="text" class="form-control" name="school_year" value="<?php echo $row['school_year']; ?>" placeholder="School Year" required>
        </div>
        <div class="form-element my-3">
            <input type="text" class="form-control" name="semester" value="<?php echo $row['semester']; ?>" placeholder="Semester" required>
        </div>
        <div class="form-element my-3">
            <input type="text" class="form-control" name="year_level" value="<?php echo $row['year_level']; ?>" placeholder="Year Level" required>
        </div>
        <div class="form-element my-3">
            <input type="text" class="form-control" name="section" value="<?php echo $row['section']; ?>" placeholder="Section" required>
        </div>

        <div class="form-element">
            <input type="submit" class="btn btn-success" name="edit" value="Update">
        </div>
    </form>
</div>

<script>
// Auto-fill student name based on ID selection
const studentData = <?php echo json_encode($studentData); ?>;
document.getElementById("student_id").addEventListener("change", function() {
    const selectedID = this.value;
    document.getElementById("fullname_student").value = studentData[selectedID] || '';
});
</script>
</body>
</html>

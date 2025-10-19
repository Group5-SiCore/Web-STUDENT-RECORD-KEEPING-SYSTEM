<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST['student_id'];
    $fullname = $_POST['fullname_student'];
    $teacher = $_POST['name_teacher'];
    $subject = $_POST['subject_name'];
    $unit = $_POST['unit'];
    $course = $_POST['course'];
    $school_year = $_POST['school_year'];
    $semester = $_POST['semester'];
    $year_level = $_POST['year_level'];
    $section = $_POST['section'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=db_record", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO tb_registration 
                (student_id, fullname_student, name_teacher, subject_name, unit, course, school_year, semester, year_level, section)
                VALUES (:student_id, :fullname_student, :name_teacher, :subject_name, :unit, :course, :school_year, :semester, :year_level, :section)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':student_id' => $studentId,
            ':fullname_student' => $fullname,
            ':name_teacher' => $teacher,
            ':subject_name' => $subject,
            ':unit' => $unit,
            ':course' => $course,
            ':school_year' => $school_year,
            ':semester' => $semester,
            ':year_level' => $year_level,
            ':section' => $section
        ]);

        header("Location: registrationtable.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

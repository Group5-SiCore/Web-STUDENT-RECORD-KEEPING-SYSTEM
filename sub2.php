<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $course_id = $_POST['course_id'];
    $subjectname = $_POST['subjectname'];
    $unit = $_POST['unit'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=db_record", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $sql = "INSERT INTO tb_subject (course_id, subjectname, unit) VALUES (:course_id, :subjectname, :unit)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':subjectname', $subjectname);
        $stmt->bindParam(':unit', $unit);

        // Execute the statement first
        $stmt->execute();

        // Redirect back to table after successful insert
        header("Location: subtable.php");
        exit(); // Always add exit after header redirect
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>

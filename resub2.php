<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $registration_id = $_POST['registration_id'];
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];
    $day = $_POST['day'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];

    try {
        // Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=db_record", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL insert query
        $sql = "INSERT INTO tb_registration_subject 
                (registration_id, subject_id, teacher_id, day, time_start, time_end)
                VALUES 
                (:registration_id, :subject_id, :teacher_id, :day, :time_start, :time_end)";
        
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':registration_id', $registration_id);
        $stmt->bindParam(':subject_id', $subject_id);
        $stmt->bindParam(':teacher_id', $teacher_id);
        $stmt->bindParam(':day', $day);
        $stmt->bindParam(':time_start', $time_start);
        $stmt->bindParam(':time_end', $time_end);

        // Execute
        $stmt->execute();

        // Redirect back to the page after success
        header("Location: resub.php");
        exit();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close connection
    $conn = null;
}
?>

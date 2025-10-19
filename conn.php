<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'db_record');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];

    // Fetch book record
    $query = "SELECT * FROM tb_student WHERE student_id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<?php
include "conn.php";
$student_id = $_GET['student_id'];
$sql = "DELETE FROM `tb_student` WHERE student_id = $student_id";
$result = mysqli_query($conn, $sql);
if($result){
    header ("Location: table.php?msg=Record deleted Succesfuly");
}
else{
    echo "Failed: " . mysqli_error($conn);
}
?>
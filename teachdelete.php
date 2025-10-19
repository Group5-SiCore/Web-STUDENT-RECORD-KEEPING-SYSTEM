<?php
include "conn.php";
$teacher_id = $_GET['teacher_id'];
$sql = "DELETE FROM `tb_teacher` WHERE teacher_id = $teacher_id";
$result = mysqli_query($conn, $sql);
if($result){
    header ("Location: teachtable.php?msg=Record deleted Succesfuly");
}
else{
    echo "Failed: " . mysqli_error($conn);
}
?>
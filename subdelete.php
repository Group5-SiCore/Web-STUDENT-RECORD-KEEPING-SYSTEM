<?php
include "conn.php";
$subject_id = $_GET['subject_id'];
$sql = "DELETE FROM `tb_subject` WHERE subject_id = $subject_id";
$result = mysqli_query($conn, $sql);
if($result){
    header ("Location: subtable.php?msg=Record deleted Succesfuly");
}
else{
    echo "Failed: " . mysqli_error($conn);
}
?>
<?php
include "conn.php";
$registration_subject_id = $_GET['registration_subject_id'];
$sql = "DELETE FROM `tb_registration_subject` WHERE registration_subject_id = $registration_subject_id";
$result = mysqli_query($conn, $sql);
if($result){
    header ("Location: resub.php?msg=Record deleted Succesfuly");
}
else{
    echo "Failed: " . mysqli_error($conn);
}
?>
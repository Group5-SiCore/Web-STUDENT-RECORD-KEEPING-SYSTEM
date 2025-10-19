<?php
include "conn.php";
$registration_id = $_GET['registration_id'];
$sql = "DELETE FROM `tb_registration` WHERE registration_id = $registration_id";
$result = mysqli_query($conn, $sql);
if($result){
    header ("Location: registrationtable.php?msg=Record deleted Succesfuly");
}
else{
    echo "Failed: " . mysqli_error($conn);
}
?>
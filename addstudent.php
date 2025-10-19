<?php

include("conn.php");

$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number']; 
$statuss=$_POST['statuss'];
$birthday=$_POST['birthday'];

$stmt=$conn->prepare("INSERT INTO `tb_student`( `firstname`,`middlename`, `lastname`,`gender`,`email`, `phone_number`,`statuss`, `birthday` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param( $firstname, $middlename, $lastname, $gender, $email, $phone_number, $statuss, $birthday);

if($stmt->execute()){
   echo json_encode(["status" => "ok"]);
} else {
    echo json_encode(["error" => "issues saving data"]);
}

?>
<script src=add.js></script>
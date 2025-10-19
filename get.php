<?php
session_start();
include"conn.php";

$stmt= $conn->prepare("SELECT * FROM tb_student");
$data=$stmt->fetchAll((PDO::FETCH_ASSOC));
echo json_encode($data);






?>











<?php 
session_start();

$conn = new PDO("mysql:host=localhost;dbname=db_record",'root','');

if(isset($_POST['btb_submit'])) {
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $statuss=$_POST['statuss'];
    $birthday=$_POST['birthday'];
    
    $sql=$conn->prepare("INSERT INTO tb_student(firstname,middlename,lastname,gender,email,phone_number,statuss,birthday) VALUES (?,?,?,?,?,?,?,?)");
    $sql->execute([$firstname,$middlename,$lastname,$gender,$email,$phone_number,$statuss,$birthday]);
    header("location:table.php");


    
}

?>

<?php 
$conn = new PDO("mysql:host=localhost;dbname=db_record",'root','');
$sql = $conn->prepare("SELECT * FROM tb_student");
$sql->execute();
$rst = $sql->fetchAll();
?>


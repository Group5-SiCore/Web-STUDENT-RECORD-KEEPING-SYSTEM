<?php 
session_start();

$conn = new PDO("mysql:host=localhost;dbname=db_record",'root','');

if(isset($_POST['btb_submit'])) {
    $student_id=$_POST['student_id'];
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
   
    
    $sql=$conn->prepare("INSERT INTO tb_teacher(firstname,middlename,lastname,age,gender) VALUES (?,?,?,?,?)");
    $sql->execute([$firstname,$middlename,$lastname,$age,$gender]);
    header("location:teachtable.php");


    
}

?>

<?php 
$conn = new PDO("mysql:host=localhost;dbname=db_record",'root','');
$sql = $conn->prepare("SELECT * FROM tb_teacher");
$sql->execute();
$rst = $sql->fetchAll();
?>

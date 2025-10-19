<?php

include 'conn.php';

session_start();
if(isset($_POST['UpdateData'])) 


if(isset($_POST['update_student_id'])){

   $update_student_id = $_POST['update_student_id'];
   $update_firstname = $_POST['update_firstname'];
   $update_middlename = $_POST['update_middlename'];
   $update_lastname= $_POST['update_lastname'];
   $update_gender = $_POST['update_gender'];
   $update_email = $_POST['update_email'];
   $update_phone_number= $_POST['update_phone_number'];
   $update_statuss= $_POST['update_statuss'];
   $update_birthday= $_POST['update_birthday'];

   mysqli_query("UPDATE tb_student SET firstname=?, middlename=?, lastname=?, gender=?, email=?, phone_number=?, statuss=?, birthday=? WHERE student_id=?");
   $stmt->execute([$firstname, $middlename, $lastname, $gender, $email, $phone_number, $statuss, $birthday, $id]);


   header('location:editstudent.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>student</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   


<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $student_id = $_GET['student_id'];
         $update_query = mysqli_query($conn, "SELECT * FROM `tb_student` WHERE student_id = '$student_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="student_id" value="<?php echo $fetch_update['student_id']; ?>">
      <input type="text" name="firstname" value="<?php echo $fetch_update['firstname']; ?>">
      
      <input type="text" name="middlename" value="<?php echo $fetch_update['middlename']; ?>">
      <input type="text" name="lastname" value="<?php echo $fetch_update['lastname']; ?>">

      <input type="text" name="gender" value="<?php echo $fetch_update['gender']; ?>">
      <input type="text" name="email" value="<?php echo $fetch_update['email']; ?>">
      
      <input type="text" name="phone_number" value="<?php echo $fetch_update['phone_number']; ?>">
      <input type="text" name="statuss" value="<?php echo $fetch_update['statuss']; ?>">
      <input type="text" name="birthday" value="<?php echo $fetch_update['birthday']; ?>">
     
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>
<?php
  // Database connection
  $conn = mysqli_connect('localhost', 'root', '', 'db_record');
  if (!$conn) {
      die('Connection failed: ' . mysqli_connect_error());
  }

  // Fetch book record if ID is set
  if (isset($_GET['student_id'])) {
      $student_id = $_GET['student_id'];

      // Fetch book record
      $query = "SELECT * FROM tb_student WHERE student_id='$student_id' LIMIT 1";
      $result = mysqli_query($conn, $query);
      $data = mysqli_fetch_assoc($result);
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>



<!-- Edit STUDENT Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit form with PHP variables -->


                <form action='table.php' method="POST">
    <!-- Hidden input field for student_id -->
    <input type="hidden" name="student_id" value="<?php echo isset($data['student_id']) ? $data['student_id'] : ''; ?>">

  
            <div class="mb-3" >
                        <label for="firstname" style="font-weight:600;">First Name</label>
                        <input type="text" class="form-control form-control-lg mb-2 border-primary" name="firstname" id="firstname" value="<?php echo $data['firstname'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="middlename" style="font-weight:600;">Middle Name</label>
                        <input type="text" class="form-control form-control-lg mb-2 border-primary" name="middlename" id="middlename" value="<?php echo $data['middlename'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="lastname" style="font-weight:600;">Last Name</label>
                        <input type="text" class="form-control form-control-lg mb-2 border-primary" name="lastname" id="lastname" value="<?php echo $data['lastname'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="gender" style="font-weight:600;">Gender</label>
                        <input type="text" class="form-control form-control-lg mb-2 border-primary" name="gender" id="gender" value="<?php echo $data['gender'] ?>">

                    </div>
                    <div class="mb-3" hidden>
                        <label for="email" style="font-weight:600;">Email</label>
                        <input type="text" class="form-control form-control-lg mb-2 border-primary" name="email" id="email" value="<?php echo $data['email'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="phone_number" style="font-weight:600;">Phone Number</label>
                        <input type="text" class="form-control form-control-lg mb-2 border-primary" name="phone_number" id="phone_number" value="<?php echo $data['phone_number'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="statuss" style="font-weight:600;">Status</label>
                        <input type="text" class="form-control form-control-lg mb-2 border-primary" name="statuss" id="statuss" value="<?php echo $data['statuss'] ?>">

                    </div>
                    <div class="mb-3">
                        <label class= "form-label">Birthday:</label>
                        <input type="date" class="form-control" name="birthday" placeholder="Birthday" value="<?php echo $data['birthday'] ?>">

                    </div>
                 
                    <div class="mb-3">
                        <!-- Update button -->
                        <input type="submit" name="UpdateData" value="Update" class="btn btn-primary">
                        <!-- Delete button -->
                        <button type="button" class="btn btn-danger" onclick="confirmDelete(<?php echo $data['student_id']; ?>)">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script to open modal on page load -->
<script>
    $(document).ready(function(){
        $('#editModal').modal('show');
    });
</script>
</body>
</html>
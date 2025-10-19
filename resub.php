
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="dashboardstyle.css">
   <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>subject</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


   <style>
     
       
    .container {
        background-color: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #3B4D86;
        color: white;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .card-header h2 {
        margin: 0;
    }

    .btn-add-book {
        float: right;
    }

    /* Adjust font sizes for table */
    table {
        font-size: 16px;
        text-align: center; /* Center-align the text within the table */
    }

    table th,
    table td {
        font-size: 18px;
        text-align: center; /* Center-align the text within table headers and data cells */
    }
  
</style>
  
      
   
</head>
<body>
   
</div><nav class="main-menu">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                           Information Dashboard
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="table.php">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                          STUDENT 
                        </span>
                    </a>
                    
                    <li class="has-subnav">
                    <a href="teachtable.php">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                          TEACHER
                        </span>
                    </a>

           
                    <li class="has-subnav">
                    <a href="subtable.php">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                          SUBJECT
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="registrationtable.php">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                          REGISTRATION
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                    <a href="resub.php">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                          REGISTRATION SUBJECT
                        </span>
                    </a>
                </li>

                


                <!-- <li>
                    <a href="views.php">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a> -->
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="login.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>



<!-- title of the page -->
<div class="container card mt-4">
    <div class="card-header mt-2">
    <!-- <div class="col-md-11"> -->

        <div class="text-center">
        <h2 class="text-start">REGISTRATION SUBJECT
        <div style="display: flex; align-items: center;float:right">
    <button type="button" class="btn btn-outline-light btn-add-book" data-toggle="modal" data-target="#mdlAddProduct"> Add Student</button>
    <a href="dashboard.php" style="margin-left: 10px; font-size: 20px;">
    
    </a>
    </div>

    <!-- title of the page -->
<!-- <div class="container card mt-4">
    <div class="card-header mt-2"> -->
    <!-- <div class="col-md-11"> -->

        <div class="text-center">
            <h2 class="text-start"> 
            <a href="dashboard.php" style="margin-left: 10px; font-size: 20px;">
    </a>
           
   
        </div>
    </div>

    <!-- start of table -->
    <table class="container table mt-4">
        <thead class="thead-light">
        <tr>
          
        
            <th scope="col">Student Name</th>
            <th scope="col">Registration ID</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Section</th>
            <th scope="col">School Year</th>
            <th scope="col">Semester</th>
            <th scope="col">Year Level</th>
            <th scope="col">Teacher Name</th>
           
           
        </tr>
        </thead>
        <tbody id="tblDisplayProduct">
        <?php
        // session_start();
        $conn= new PDO("mysql:host=localhost;dbname=db_record",'root','');
        $sql = $conn->prepare("SELECT * FROM q_registration");
        $sql->execute();
        $rst = $sql->fetchAll();
        ?>
        
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rst as $row): ?>
            <tr>
                <td><?php echo $row['student_name']; ?></td>
                <td><?php echo $row['registration_id']; ?></td>
                <td><?php echo $row['subjectname']; ?></td>
                <td><?php echo $row['section']; ?></td>
                <td><?php echo $row['school_year']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td><?php echo $row['year_level']; ?></td>
                <td><?php echo $row['teacher_name']; ?></td>
               


               
               
               
              
                <?php endforeach; ?>
    </tbody>
</table>










    
   <!-- Add Product Modal -->
<!-- Add Subject Modal -->
<div class="modal fade" id="mdlAddProduct" tabindex="-1" aria-labelledby="mdlAddProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="frmAddSubject" method="POST" action="resub2.php">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="mdlAddProductLabel">Registration Subject</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                    <tbody>

                    
                    <tr>  
                                <th scope="row">STUDENT ID</th>
                           <td>  <select name="registration_id" id="registration_id" class="form-select" style="width: 310px;">               
                    <?php
    $query = "SELECT * FROM tb_student";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if ($data) {
        foreach ($data as $row) {
            // Check if student_id is not NULL before adding it as an option
            if ($row['student_id'] !== null) {
                ?>
                <option value="<?php echo $row['student_id']; ?>"><?php echo $row['student_id']; ?> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                <?php
            }
        }
    }
    ?>


                              <tr>  
                                <th scope="row">Registration ID</th>
                           <td>  <select name="registration_id" id="registration_id" class="form-select" style="width: 310px;">
                              
                            <?php
                        $query = "SELECT * FROM tb_registration";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $data = $stmt->fetchAll();
                        if ($data) {
        foreach ($data as $row) {
            // Check if student_id is not NULL before adding it as an option
            if ($row['registration_id'] !== null) {
                ?>                  
                <option value="<?php echo $row['registration_id']; ?>"><?php echo $row['registration_id']; ?> </option>
                <?php
            }
        }
    }
    ?>
</select>
</td>
</tr>   

<tr>  
                                <th scope="row">Subject ID</th>
                           <td>  <select name="subject_id" id="subject_id" class="form-select" style="width: 310px;">
                              
                            <?php
    $query = "SELECT * FROM tb_subject";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if ($data) {
        foreach ($data as $row) {
            // Check if student_id is not NULL before adding it as an option
            if ($row['subject_id'] !== null) {
                ?>
                <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subjectname']; ?></option>
                <?php
            }
        }
    }
    ?>
</select>
</td>
</tr>   
                              <th scope="row">Teacher ID</th>
                           <td>  <select name="teacher_id" id="teacher_id" class="form-select" style="width: 310px;">
                              
                            <?php
    $query = "SELECT * FROM q_teacher";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if ($data) {
        foreach ($data as $row) {
            // Check if student_id is not NULL before adding it as an option
            if ($row['teacher_id'] !== null) {
                ?>
                <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['TName']; ?></option>
                <?php
            }
        }
    }
    ?>
</select>
</td>
</tr>     
                            <tr>
                                <th scope="row">Day</th>
                                <td><input type="date" class="form-control" id="day" name="day" /></td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btn_submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

               
                </div>
            </div>
        </form>
    </div>
</div>

                    
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">'
   <link rel="stylesheet" href="dashboardstyle.css">
   <link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Teacher</title>
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

                
                <li>
                    <a href="search.php">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a> 
                </li>
            </ul>

                

<!-- 
                <li>
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
        <div class="text-center">
            <h2 class="text-start">TEACHER INFORMATION
            <div style="display: flex; align-items: center;float:right">
    <button type="button" class="btn btn-outline-light btn-add-book" data-toggle="modal" data-target="#mdlAddProduct"> Add Student</button>
    <a href="dashboard.php" style="margin-left: 10px; font-size: 20px;">
    </a>
    </div>
        </div>
    </div>

    <!-- start of table -->
    <table class="container table mt-4">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
           <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="tblDisplayProduct">
        <?php
        // session_start();
        $conn= new PDO("mysql:host=localhost;dbname=db_record",'root','');
        $sql=$conn->prepare("SELECT * FROM tb_teacher");
        $sql->execute();
        $rst=$sql->fetchAll();
        foreach ($rst as $CX) {?>
            <tr>
                <th scope="row"><?php echo $CX['teacher_id'];?></th>
                <td><?php echo $CX['firstname'];?></td>
                <td><?php echo $CX['middlename'];?></td>
                <td><?php echo $CX['lastname'];?></td>
                <td><?php echo $CX['age'];?></td>
                <td><?php echo $CX['gender'];?></td>
                <td>
                    <a href="teachedit.php?teacher_id=<?php echo $CX['teacher_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="teachdelete.php?teacher_id=<?php echo $CX['teacher_id']; ?>" class="btn btn-danger btn-sm">Delete</a>

                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

   <!-- Add Teacher Modal -->
<div class="modal fade" id="mdlAddProduct" tabindex="-1" aria-labelledby="mdlAddProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="frmAddProduct" method="POST" action="teachtable2.php">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="mdlAddProductLabel">Add Teacher Information</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
               
    <div class="mb-4 row">
        <label class="col-sm-4 col-form-label">First Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="firstname" name="firstname"/>
        </div>
    </div>
    <div class="mb-5 row">
        <label class="col-sm-4 col-form-label">Middle Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="middlename" name="middlename"/>
        </div>
    </div>
    <div class="mb-4 row">
        <label class="col-sm-4 col-form-label">Last Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="lastname" name="lastname"/>
        </div>
    </div>
    <div class="mb-4 row">
        <label class="col-sm-4 col-form-label">Age</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="age" name="age"/>
        </div>
    </div>
    <div class="mb-4 row">
        <label class="col-sm-4 col-form-label">Gender</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="gender" name="gender"/>
        </div>
    </div>
   

            
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btb_submit">Save</button>
        </div>
    </div>
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
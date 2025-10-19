<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="dashboardstyle.css">
   <link rel="stylesheet" href="./bootstrap/bootstrap.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration</title>
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

    .btn-add-book {
        float: right;
    }

    table {
        font-size: 20px;
        text-align: center;
    }

    table th, table td {
        font-size: 18px;
        text-align: center;
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
    <ul class="logout">
        <li><a href="login.php"><i class="fa fa-power-off fa-2x"></i><span class="nav-text">Logout</span></a></li>
    </ul>
</nav>

<div class="container card mt-4">
    <div class="card-header mt-2">
        <h2 class="text-start">REGISTRATION
            <button type="button" class="btn btn-outline-light btn-add-book" data-toggle="modal" data-target="#mdlAddProduct">Add Student</button>
        </h2>
    </div>

    <!-- Table -->
    <table class="container table mt-4">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Teacher Name</th>
                <th>Subject Name</th>
                <th>Unit</th>
                <th>Course</th>
                <th>School Year</th>
                <th>Semester</th>
                <th>Year Level</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=db_record", 'root', '');
            $sql = $conn->prepare("SELECT * FROM tb_registration");
            $sql->execute();
            $rst = $sql->fetchAll();
            foreach ($rst as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['registration_id']) ?></td>
                    <td><?= htmlspecialchars($row['student_id']) ?></td>
                    <td><?= htmlspecialchars($row['fullname_student']) ?></td>
                    <td><?= htmlspecialchars($row['name_teacher']) ?></td>
                    <td><?= htmlspecialchars($row['subject_name']) ?></td>
                    <td><?= htmlspecialchars($row['unit']) ?></td>
                    <td><?= htmlspecialchars($row['course']) ?></td>
                    <td><?= htmlspecialchars($row['school_year']) ?></td>
                    <td><?= htmlspecialchars($row['semester']) ?></td>
                    <td><?= htmlspecialchars($row['year_level']) ?></td>
                    <td><?= htmlspecialchars($row['section']) ?></td>
                    <td>
                        <a href="editregister.php?registration_id=<?= $row['registration_id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="regisdelete.php?registration_id=<?= $row['registration_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- ADD REGISTRATION MODAL -->
<div class="modal fade" id="mdlAddProduct" tabindex="-1" aria-labelledby="mdlAddProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="registration2.php">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Add Registration</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <!-- STUDENT ID -->
                            <tr>
                                <th>Student ID</th>
                                <td>
                                    <select name="student_id" id="student_id" class="form-control" required>
                                        <option value="">Select Student</option>
                                        <?php
                                        $stmt = $conn->prepare("SELECT * FROM tb_student");
                                        $stmt->execute();
                                        foreach ($stmt->fetchAll() as $s) {
                                            echo '<option value="'.$s['student_id'].'" data-name="'.$s['firstname'].' '.$s['lastname'].'">'.$s['student_id'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <!-- STUDENT NAME -->
                            <tr>
                                <th>Student Name</th>
                                <td><input type="text" id="fullname_student" name="fullname_student" class="form-control" readonly></td>
                            </tr>

                            <!-- TEACHER -->
                            <tr>
                                <th>Teacher</th>
                                <td>
                                    <select name="name_teacher" class="form-control" required>
                                        <option value="">Select Teacher</option>
                                        <?php
                                        $stmt = $conn->prepare("SELECT * FROM tb_teacher");
                                        $stmt->execute();
                                        foreach ($stmt->fetchAll() as $t) {
                                            echo '<option value="'.$t['firstname'].' '.$t['middlename'].' '.$t['lastname'].'">'.$t['firstname'].' '.$t['lastname'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <!-- SUBJECT -->
                            <tr>
                                <th>Subject</th>
                                <td>
                                    <select name="subject_name" id="subject_name" class="form-control" required>
                                        <option value="">Select Subject</option>
                                        <?php
                                        $stmt = $conn->prepare("SELECT * FROM tb_subject");
                                        $stmt->execute();
                                        foreach ($stmt->fetchAll() as $subj) {
                                            echo '<option value="'.$subj['subjectname'].'" data-unit="'.$subj['unit'].'">'.$subj['subjectname'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <!-- UNIT -->
                            <tr>
                                <th>Unit</th>
                                <td><input type="text" id="unit" name="unit" class="form-control" readonly></td>
                            </tr>

                            <tr>
                                <th>Course</th>
                                <td><input type="text" class="form-control" name="course" required></td>
                            </tr>
                            <tr>
                                <th>School Year</th>
                                <td><input type="text" class="form-control" name="school_year" required></td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td><input type="text" class="form-control" name="semester" required></td>
                            </tr>
                            <tr>
                                <th>Year Level</th>
                                <td><input type="text" class="form-control" name="year_level" required></td>
                            </tr>
                            <tr>
                                <th>Section</th>
                                <td><input type="text" class="form-control" name="section" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// auto-fill student name
document.getElementById('student_id').addEventListener('change', function() {
    var name = this.options[this.selectedIndex].getAttribute('data-name');
    document.getElementById('fullname_student').value = name || '';
});

// auto-fill unit when subject is selected
document.getElementById('subject_name').addEventListener('change', function() {
    var unit = this.options[this.selectedIndex].getAttribute('data-unit');
    document.getElementById('unit').value = unit || '';
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

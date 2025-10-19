<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Subject Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* Global */
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      margin: 0;
      padding: 0;
      display: flex;
    }

    /* Sidebar Navigation */
    .main-menu {
      background-color: #2c3e50;
      position: fixed;
      top: 0;
      left: 0;
      width: 230px;
      height: 100vh;
      color: #ecf0f1;
      padding-top: 30px;
      box-shadow: 2px 0 10px rgba(0,0,0,0.2);
    }

    .main-menu ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .main-menu li {
      padding: 10px 20px;
    }

    .main-menu a {
      text-decoration: none;
      color: #ecf0f1;
      display: flex;
      align-items: center;
      transition: all 0.2s ease-in-out;
    }

    .main-menu a:hover {
      background-color: #34495e;
      border-radius: 6px;
    }

    .main-menu i {
      margin-right: 10px;
    }

    .nav-text {
      font-size: 15px;
      font-weight: 500;
    }

    .logout {
      position: absolute;
      bottom: 20px;
      width: 100%;
    }

    /* Main Content */
    .content {
      margin-left: 250px;
      padding: 40px;
      width: calc(100% - 250px);
    }

    .card {
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      border: none;
      border-radius: 10px;
      background: white;
    }

    .card-header {
      border-radius: 10px 10px 0 0;
      font-weight: 600;
      font-size: 1.2rem;
    }

    /* Table */
    table {
      border-radius: 8px;
      overflow: hidden;
    }

    thead.table-dark th {
      background-color: #2c3e50 !important;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 14px;
    }

    tbody tr:hover {
      background-color: #f1f1f1;
    }

    .input-group input {
      border-radius: 5px 0 0 5px;
    }

    .btn-success {
      border-radius: 0 5px 5px 0;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<nav class="main-menu">
  <ul>
    <li><a href="dashboard.php"><i class="fa fa-home fa-2x"></i><span class="nav-text">Dashboard</span></a></li>
    <li><a href="table.php"><i class="fa fa-user fa-2x"></i><span class="nav-text">Student</span></a></li>
    <li><a href="teachtable.php"><i class="fa fa-chalkboard-teacher fa-2x"></i><span class="nav-text">Teacher</span></a></li>
    <li><a href="subtable.php"><i class="fa fa-book fa-2x"></i><span class="nav-text">Subject</span></a></li>
    <li><a href="registrationtable.php"><i class="fa fa-clipboard-list fa-2x"></i><span class="nav-text">Registration</span></a></li>
    <li><a href="search.php"><i class="fa fa-search fa-2x"></i><span class="nav-text">Documentation</span></a></li>
  </ul>
  <ul class="logout">
    <li><a href="login.php"><i class="fa fa-power-off fa-2x"></i><span class="nav-text">Logout</span></a></li>
  </ul>
</nav>

<!-- Main Content -->
<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
      <div class="card-header bg-primary text-white">
        REGISTRATION SUBJECT RECORD
      </div>
      <div class="card-body">

        <!-- Search Form -->
        <form action="" method="GET" class="mb-3">
          <div class="input-group">
            <input type="text" name="search"
              value="<?php if(isset($_GET['search'])) echo htmlspecialchars($_GET['search']); ?>"
              class="form-control" placeholder="Search data..." required>
            <button type="submit" class="btn btn-success">Search</button>
          </div>
        </form>

        <!-- Table -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
              <tr>
                <th>Student Name</th>
                <th>Registration ID</th>
                <th>Subject Name</th>
                <th>Section</th>
                <th>School Year</th>
                <th>Semester</th>
                <th>Year Level</th>
                <th>Teacher Name</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              $conn = mysqli_connect('localhost', 'root', '', 'db_record');

              if (!$conn) {
                  echo "<tr><td colspan='8' class='text-danger text-center'>Database Connection Failed: " . mysqli_connect_error() . "</td></tr>";
                  exit;
              }

              if (isset($_GET['search']) && !empty($_GET['search'])) {
                  $filtervalues = mysqli_real_escape_string($conn, $_GET['search']);
                  $query = "
                      SELECT * FROM tb_registration
                      WHERE CONCAT(fullname_student, registration_id, subject_name, section, school_year, semester, year_level, name_teacher)
                      LIKE '%$filtervalues%'
                  ";
              } else {
                  $query = "SELECT * FROM tb_registration";
              }

              $query_run = mysqli_query($conn, $query);

              if ($query_run === false) {
                  echo "<tr><td colspan='8' class='text-danger text-center'>SQL Error: " . mysqli_error($conn) . "</td></tr>";
              } elseif (mysqli_num_rows($query_run) > 0) {
                  while ($items = mysqli_fetch_assoc($query_run)) {
                      echo "<tr>
                          <td>{$items['fullname_student']}</td>
                          <td>{$items['registration_id']}</td>
                          <td>{$items['subject_name']}</td>
                          <td>{$items['section']}</td>
                          <td>{$items['school_year']}</td>
                          <td>{$items['semester']}</td>
                          <td>{$items['year_level']}</td>
                          <td>{$items['name_teacher']}</td>
                      </tr>";
                  }
              } else {
                  echo "<tr><td colspan='8' class='text-center text-danger'>No Record Found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

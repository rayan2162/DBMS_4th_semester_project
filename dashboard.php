<?php include 'connection.php';?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'admincheck.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard with Logo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .dashboard-header {
      background-color: #f8f9fa;
      padding: 20px;
    }
    .dashboard-section {
      padding: 20px;
      border: 1px solid #dee2e6;
      margin-top: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .dashboard-section h4 {
      margin-bottom: 10px;
    }
    .dashboard-section p {
      margin-bottom: 20px;
    }
    .dashboard-buttons {
      display: flex;
      gap: 10px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="UNilogo.png" style="height: 40px;" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Versions</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="versionsCreate.php">Create Version</a></li>
            <li><a class="dropdown-item" href="versionDisplay.php">Display Versions</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Courses</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="coursesCreate.php">Create Course</a></li>
            <li><a class="dropdown-item" href="courseDisplay.php">Display Courses</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Course Profile</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="createcourseProfile.php">Create</a></li>
            <li><a class="dropdown-item" href="profileDisplay.php">Display</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Program Outcomes</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="POcreate.php">Create</a></li>
            <li><a class="dropdown-item" href="POdisplay.php">Display</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <button>
  <a class="btn btn-primary" href="logout.php" role="button">LOGOUT</a></button>
</nav>

<div class="container-fluid mt-3">
  <div class="dashboard-header">
    <h1>Welcome to Dashboard</h1>
    <p>This is your dashboard page where you can manage versions, courses, and course profiles for your system.</p>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="dashboard-section">
        <h4>Versions</h4>
        <p>Manage different software versions here. You can create new versions and display existing ones.</p>
        <div class="dashboard-buttons">
          <a href="versionsCreate.php" class="btn btn-primary">Create New Version</a>
          <a href="versionDisplay.php" class="btn btn-secondary">Display Versions</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="dashboard-section">
        <h4>Courses</h4>
        <p>Manage various courses here. You can create new courses and display existing ones.</p>
        <div class="dashboard-buttons">
          <a href="coursesCreate.php" class="btn btn-primary">Create New Course</a>
          <a href="courseDisplay.php" class="btn btn-secondary">Display Courses</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="dashboard-section">
        <h4>Course Profile</h4>
        <p>Manage course profiles here. You can create new profiles and display existing ones.</p>
        <div class="dashboard-buttons">
          <a href="createcourseProfile.php" class="btn btn-primary">Create New Profile</a>
          <a href="profileDisplay.php" class="btn btn-secondary">Display Profiles</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="dashboard-section">
        <h4>Program Outcomes</h4>
        <p>Manage program outcomes here.You can create new program outcomes and display existing ones.</p>
        <div class="dashboard-buttons">
          <a href="POcreate.php" class="btn btn-primary">Create New Program Outcomes</a>
          <a href="POdisplay.php" class="btn btn-secondary">Display Program Outcomes</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

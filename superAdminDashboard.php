<?php include 'connection.php'?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'sAdmincheck.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="topNav.css">

    <title>Welcome Super Admin</title>

</head>
<body>

<div class="topnav">
<a href="superAdminDashboard.php">Dashboard</a>
<a href="allCourse.php">Course Profile</a>
<a href="allDepartment.php">All department</a>
<a href="createDepartment.php">Create Department</a>
<a href="allUser.php">All Admin</a>
<a href="approveList.php">Approve</a>   

<a href="logout.php" class="logout">Logout</a>

</div>
<br>
    <h1>Dashboard</h1>
<br>
    <span>
        Welcome, <?php echo $_SESSION['userName'];?>
    </span>

    <span>
        <?php echo $_SESSION['role'];?>
    </span>
    <br>    

</body>
</html>
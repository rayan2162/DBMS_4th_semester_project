<?php include 'connection.php'?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="topNav.css">

    <title>Document</title>

</head>
<body>

<div class="topnav">

<a href="courseProfile.php">Course Profile</a>
<a href="allDepartment.php">All department</a>
<a href="createDepartment.php">Create Department</a>
<a href="allUser.html">All Admin</a>
<a href="reg.php">Approve</a>   

<a href="" class="logout">Logout</a>

</div>

    <h1>course profile</h1>

    <span>Welcome, <?php echo $_SESSION['userName'];?></span> 
    <span><?php echo $_SESSION['role'];?></span>
    <br>    

</body>
</html>
<?php include 'connection.php' ?>
<?php session_start(); ?>
<?php include 'isLoggedin.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="defaultCenter.css">
    <link rel="stylesheet" href="topNav.css">

    <title>Create Department</title>

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

    <br>
    <h1>Create Department</h1>
    <br>

    <form action="" method="post">
        <div class="container">

            <input type="text" class="form-control" name="deptName" id="deptName" placeholder="Enter department name">
            <br><br>

            <input type="text" name="deptShortName" id="deptShortName" placeholder="Enter department short name">
            <br><br>

            <button type="submit" class="btn" name="deptCreate">Create</button>

        </div>
    </form>

</body>

</html>
<?php
if (isset($_POST['deptCreate'])) {
    $deptName = $_POST['deptName'];
    $deptShortName = $_POST['deptShortName'];

    $str = "INSERT INTO department(deptName, deptShortName)
                 VALUES ('". $deptName ."', '". $deptShortName ."')";

    if (mysqli_query($conn, $str)) {
        echo 'Successfully Inserted';
    }
}
?>
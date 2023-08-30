<?php include 'connection.php'?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'sAdmincheck.php';?>

<?php 
    $s = "select * from department";
    $q = mysqli_query($conn, $s);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        All Deppartment
    </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="topNav.css">

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

    <div class="container">

        <h2>All Departments</h2>

        <table class="table table-striped">

            <thead>

                <th>Id</th>
                <th>Department name</th>
                <th>Department short name</th>
                <th>Action</th>

            </thead>

            <tbody>

                <?php 
                    while($r = mysqli_fetch_array($q)){ ?>
                        <tr>
                            <td><?php echo $r['deptId'] ?></td>
                            <td><?php echo $r['deptName'] ?></td>
                            <td><?php echo $r['deptShortName'] ?></td>
                            <td>

                                <a class="btn btn-secondary" href="editDepartment.php?deptId=<?php echo $r['deptId'] ?>">
                                    Edit
                                </a>

                                
                            </td>
                        </tr>
                    <?php }
                ?>     
            </tbody>
        </table>
    </div>
</body>
</html>
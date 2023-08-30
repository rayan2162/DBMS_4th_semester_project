<?php include 'connection.php' ?>
<?php session_start(); ?>
<?php include 'isLoggedin.php'; ?>
<?php include 'sAdmincheck.php';?>

<?php 
    $s = "select * from user where userStatus=0";
    $q = mysqli_query($conn, $s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="topNav.css">

    <title>All Department</title>
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
        <h2>Approve</h2>
        <table class="table table-striped">
            <thead>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    while($r = mysqli_fetch_assoc($q)){ ?>
                        <tr>
                            <td><?php echo $r['UserSn'] ?></td>
                            <td><?php echo $r['userName'] ?></td>
                            <td><?php echo $r['email'] ?></td>
                            <td>
                                <a href="approve.php?UserSn=<?php echo $r['UserSn'] ?>">Approve</a>
                            </td>
                        </tr>
                    <?php }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>
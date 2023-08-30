<?php include 'connection.php'?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'sAdmincheck.php';?>
<?php
$s= "SELECT * FROM user";
$q = mysqli_query($conn,$s);
$rs = mysqli_fetch_assoc($q);
$role = $rs['role'];
if($role=="admin"){
    header('location:dashboard.php'); 
}
?>

<?php 
    $s = "select * from user where userStatus=true ";
    $q = mysqli_query($conn, $s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Admin
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
        <h2>All Admin</h2>
        <table class="table table-striped">
            <thead>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    while($r = mysqli_fetch_array($q)){ ?>
                        <tr>
                            <td><?php echo $r['UserSn'] ?></td>
                            <td><?php echo $r['userName'] ?></td>
                            <td><?php echo $r['email'] ?></td>
                            <td><?php echo $r['phone'] ?></td>
                            <td><?php echo $r['deptId'] ?></td>

                            <td>
                                <a class="btn btn-secondary" href="editUser.php?UserSn=<?php echo $r['UserSn'] ?>">
                                    Edit
                                </a>

                                <a class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $r['UserSn'] ?>" >
                                    Delete
                                </a>


                                <div class="modal" id="myModal<?php echo $r['UserSn'] ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Confirmation</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Are you sure you want to delete <?php echo $r['userName'] ?>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="deleteUser.php?UserSn=<?php echo $r['UserSn'] ?>" class="btn btn-danger">Yes</a>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>
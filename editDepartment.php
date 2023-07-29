<?php include 'connection.php'?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>

<?php 
    $dept_Id = $_REQUEST['deptId'];
    $s = "SELECT * FROM department WHERE deptId=$dept_Id";
    $q = mysqli_query($conn, $s);
    $r = mysqli_fetch_assoc($q);
?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="topNav.css">

    <title>Edit Department</title>

</head>

<body>

<div class="topnav">

<a href="allDepartment.php">All department</a> 

<a href="logout.php" class="logout">Logout</a>

</div> 

    <div class="container">

        <h2>Edit Department</h2>

        <form action="" method="post">

            <div class="form-group">
                
                <label for="">Department Name</label>
                <input type="text" value="<?php echo $r['deptName'] ?>" class="form-control" name="deptName" id="">
            
            </div>

            <div class="form-group">
                
                <label for="">Short Name</label>
                <input type="text" value="<?php echo $r['deptShortName'] ?>" class="form-control" name="deptShortName" id="">
            
            </div>
            
            <div>
                
                <button type="submit" class="btn btn-primary" name="submitBtn">Update</button>
            
            </div>

        </form>

    </div>

</body>

</html>

<?php 
    if(isset($_POST['submitBtn'])){

        $dept_name = $_POST['deptName'];
        $dept_short_name = $_POST['deptShortName'];

        $str = "update department set deptName='".$dept_name."', deptShortName='".$dept_short_name."' where deptId= $dept_Id";

        if(mysqli_query($conn, $str)){
           header('Location: allDepartment.php');
        }
    }
?>
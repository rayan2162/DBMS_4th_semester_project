<?php include 'connection.php'; ?>
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
    <title>Edit Department</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div>
            <ul>
                <li><a href="index.php">Create Department</a></li>
                <li><a href="departments.php">All Departments</a></li>
                <li><a href="index_emp.php">Create Employees</a></li>
                <li><a href="employees.php">All Employees</a></li>
            </ul>
        </div>
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
        // convert this string to query
        if(mysqli_query($conn, $str)){
           header('Location: allDepartment.php');
        }
    }
?>
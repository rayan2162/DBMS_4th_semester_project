<?php include 'connection.php'?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>

<?php 
    $user_Id = $_REQUEST['userId'];
    $s = "SELECT * FROM user WHERE userId=$user_Id";
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
    
    <title>Edit Admin</title>

</head>
<body>

<div class="topnav">

<a href="allUser.php">All Admin</a> 

<a href="logout.php" class="logout">Logout</a>

</div>

    <div class="container">
    
        <h2>Edit Admin</h2>

        <form action="" method="post">

            <!-- <div class="form-group">

                <label for="">User ID</label>
                <input type="text" value="<?php echo $r['userId'] ?>" class="form-control" name="userId" id="">
            
            </div> -->

            <div class="form-group">
                
                <label for="">User Name</label>
                <input type="text" value="<?php echo $r['userName'] ?>" class="form-control" name="userName" id="">
            
            </div>

            <div class="form-group">

                <label for="">Email</label>
                <input type="text" value="<?php echo $r['email'] ?>" class="form-control" name="email" id="">
            
            </div>

            <div class="form-group">

                <label for="">Phone</label>
                <input type="text" value="<?php echo $r['phone'] ?>" class="form-control" name="phone" id="">
            
            </div>

            <div class="form-group">

                <label for="">Department</label>
                <input type="text" value="<?php echo $r['deptId'] ?>" class="form-control" name="deptId" id="">
            
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

        $user_Id = $_REQUEST['userId'];
        $user_name = $_POST['userName'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $dept_id = $_POST['deptId'];

        $str = "update user set userName='".$user_name."', email='".$user_email."', phone='".$user_phone."', deptId='".$dept_id."' where userId= $user_Id";

        if(mysqli_query($conn, $str)){
           header('Location: allUser.php');
        }
    }

    //userId='".$user_id."',
?>
<?php include 'connection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="topNav.css">
    <link rel="stylesheet" href="button.css">
    <link rel="stylesheet" href="defaultCenter.css">

    <title>Registration</title>

</head>

<body>
    
    <div class="topnav">

        <a href="login.php">Login</a>
        <a href="registration.php">Registration</a> 
        
    </div>

    <div class="container">
<br>
        <h1>Registration</h1>
<br>
    <form action="" method="post">
                
                <input type="text" name="userName" class="form-control" id="" placeholder="Enter your name">
                <br>

                <input type="email" name="email" class="form-control" id="" placeholder="Enter your email">
                <br>

                <input type="text" name="phone" class="form-control" id="" placeholder="Enter your phone number">
                <br>
                <br>


                <label for="">Select department</label>
                <br>
                <select name="deptId">
                <?php
                    $s = "SELECT * FROM department;";
                    $dept = mysqli_query($conn, $s);
                    while($c = mysqli_fetch_array($dept)){
                ?>
                <option value="<?php echo $c['deptId'] ?>">
                        <?php echo $c['deptName'] ?>              
                </option>  
                        <?php } ?>           
                </select>
                <br>
                <br>

                
                <input type="password" name="password" class="form-control" id="" placeholder="Enter your password">
                <br>

                <input type="password" name="cnf_password" class="form-control" id="" placeholder="Confirm your password">
                <br>
                <br>

                <button type="submit" class="btn btn-primary" name="btnRegister">
                    Register
                </button>

        </div>    
            
    </form>

</body>
</html>

<?php 
    if(isset($_POST['btnRegister'])){

        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $deptId = $_POST['deptId'];
        $password = $_POST['password'];
        $confirm = $_POST['cnf_password'];
        
        if($password == $confirm){

            $password = md5($password);

            $s = "INSERT INTO user(userName, email, phone, deptId ,password, role, userStatus) 
                  values ('".$userName."','".$email."','".$phone."', '".$deptId."', '".$password."','admin','0')";

            if(mysqli_query($conn, $s)){

                echo 'User Registered. Pending for approval.';

            }

        }

    }
?>
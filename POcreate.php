<?php
include 'connection.php'; // Include the database connection file

if (isset($_POST['submit'])) {
    $outcomeName = $_POST['name'];
    $outcomeDescription = $_POST['outcomeDescription'];
    $deptID = $_POST['deptId'];

    $sql = "INSERT INTO programoutcomes (PO, OutcomeDescription, deptId) VALUES ('$outcomeName', '$outcomeDescription','$deptID')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
       header('location:POdisplay.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'admincheck.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Insert Program Outcomes</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-3">Insert Program Outcomes</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter PO Name" autocomplete="off" name="name">
            </div>
            <div class="form-group">
                <label for="outcomeDescription">Description</label>
                <input type="text" class="form-control" id="outcomeDescription" placeholder="Enter Program Outcomes Description" autocomplete="off" name="outcomeDescription">
            </div>
            <div class="form-group">
                <label for="deptId">Department</label>
                <select class="form-control" name="deptId">
                    <option value="">Select Department</option>
                    <?php 
                    $sql = 'SELECT deptId, deptShortName from department';
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row['deptId'].'">'.$row['deptShortName'].'</option>';
                    }
                    ?>   
                </select>
            </div>
            <!-- Add any necessary input fields for foreign key values or other attributes -->
            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>


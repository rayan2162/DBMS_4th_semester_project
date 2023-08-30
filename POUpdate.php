<?php
include 'connection.php';
$id = $_GET['updateid'];
$query = "SELECT * FROM programoutcomes WHERE OutcomeID = $id";
$result = mysqli_query($conn, $query);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $outcomeName = $row['PO'];
  $outcomeDescription = $row['OutcomeDescription'];
  $deptId = $row['deptId'];
}

if (isset($_POST['submit'])) {
  $outcomeName = $_POST['outcomeName'];
  $outcomeDescription = $_POST['outcomeDescription'];
  $deptId = $_POST['deptId'];
  
  $query = "UPDATE programoutcomes SET PO='$outcomeName', OutcomeDescription='$outcomeDescription', deptId='$deptId' WHERE OutcomeID=$id";
  $result = mysqli_query($conn, $query);
  
  if ($result) {
    header('location:PODisplay.php');
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Update Program Outcome</title>
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
  <h2 class="text-center my-3">Update Program Outcome</h2>
  <form method="post">
    <div class="form-group">
      <label for="outcomeName">Name</label>
      <input type="text" class="form-control" id="outcomeName" placeholder="Enter PO Name"
             autocomplete="off" name="outcomeName"
             value="<?php echo $outcomeName ?>">
    </div>
    <div class="form-group">
      <label for="outcomeDescription">Description</label>
      <input type="text" class="form-control" id="outcomeDescription"
             autocomplete="off" name="outcomeDescription"
             value="<?php echo $outcomeDescription ?>">
    </div>
    <div class="form-group">
      <label for="deptId">Department</label>
      <select class="form-control" id="deptId" name="deptId">
        <option value="">Select Department</option>
        <?php
          $sql = 'SELECT deptId, deptShortName FROM department';
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $selected = ($row['deptId'] == $deptId) ? 'selected' : '';
            echo '<option value="' . $row['deptId'] . '" ' . $selected . '>' . $row['deptShortName'] . '</option>';
          }
        ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
  </form>
</div>
</body>
</html>

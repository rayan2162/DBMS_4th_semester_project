<?php
include 'connection.php';
$id = $_GET['updateid'];
$query = "SELECT * FROM courses WHERE courses.id = $id";
$result = mysqli_query($conn, $query);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $courseName = $row['courseName'];
  $courseDescription = $row['courseDescription'];
}
if (isset($_POST['submit'])) {
  $courseName = $_POST['courseName'];
  $courseDescription = $_POST['courseDescription'];
  $selectVersion = $_POST['selectVersion'];
  $query = "UPDATE courses SET courseName = '$courseName', courseDescription = '$courseDescription' WHERE courses.id = $id";
  $result = mysqli_query($conn, $query);
  if ($result) {
    header('location:courseDisplay.php');
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
  <style>
    body {
      background-image: url('background.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 40px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
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
  <title>Edit Course</title>
</head>
<body>
  <div class="container">
    <h2>Edit Course</h2>
    <form method="post">
      <div class="form-group">
        <label for="courseName">Name</label>
        <input type="text" class="form-control" placeholder="Enter course name"
               autocomplete="off" name="courseName" value="<?php echo $courseName ?>">
      </div>
      <div class="form-group">
        <label for="courseDescription">Description</label>
        <input type="text" class="form-control" placeholder="Enter Course Description"
               autocomplete="off" name="courseDescription" value="<?php echo $courseDescription ?>">
      </div>
      <div class="form-group">
        <label for="selectVersion">Versions</label>
        <select class="form-control" name="selectVersion">
          <option>Select Versions</option>  
          <?php 
            $sql = 'SELECT id, VersionName from versions';
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $selected = ($row['id'] == $selectVersion) ? 'selected' : '';
              echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['VersionName'].'</option>';
            }
          ?>   
        </select>
      </div>
      <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
    </form>
  </div>
</body>
</html>

<?php 
include 'connection.php';
if(isset($_POST['submit'])){
  $courseName=$_POST['courseName'];
  $courseDescription=$_POST['courseDescription'];
  $selectVersion=$_POST['selectVersion'];
  $sql="INSERT INTO courses(courseName,courseDescription,versionId) VALUES('$courseName','$courseDescription','$selectVersion')";
  $query=mysqli_query($conn,$sql);
  if($query){
    //echo "Data inserted";
   header('location:courseDisplay.php');
  }else{
    die(mysqli_error($conn));
  }

}
?>


<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'admincheck.php';?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Crud operation</title>
  </head>
  <body>
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
<body>
  <div class="container">
    <h2>Create Course</h2>
    <form method="post">
      <div class="form-group">
        <label for="courseName">Course Name</label>
        <input type="text" class="form-control" id="courseName" placeholder="Enter course name" name="courseName" required>
      </div>
      <div class="form-group">
        <label for="courseDescription">Course Description</label>
        <input type="text" class="form-control" id="courseDescription" placeholder="Enter Course Description" name="courseDescription" required>
      </div>
      <div class="form-group">
        <label for="selectVersion">Versions</label>
        <select class="form-control" name="selectVersion" required>
          <option>Select Versions</option>
          <?php 
            $sql='SELECT id, VersionName from versions';
            $result=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
              echo '<option value="'.$row['id'].'">'.$row['VersionName'].'</option>';
            }
          ?>   
        </select>
      </div>
      <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
    </form>
</body>
</html>

   

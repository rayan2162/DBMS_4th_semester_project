<?php include 'connection.php';>
<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'admincheck.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <title>Create Version</title>
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
</head>
<body>
  <div class="container">
    <h2>Create Version</h2>
    <form method="post">
      <div class="form-group">
        <label for="version">Version</label>
        <input type="text" class="form-control" id="version" placeholder="Enter version name" name="version" required>
      </div>
      <div class="form-group">
        <label for="releaseDate">Release Date</label>
        <input type="date" class="form-control" id="releaseDate" name="releaseDate" required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter Version Description" name="description" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
    </form>
    
    <?php 
    
    if(isset($_POST['submit'])){
      $version=$_POST['version'];
      $releaseDate=$_POST['releaseDate'];
      $description=$_POST['description'];
      $sql="INSERT INTO versions(VersionName,ReleaseDate,Description) VALUES('$version','$releaseDate','$description')";
      $query=mysqli_query($conn,$sql);
      if($query){
        header('location:versionDisplay.php');
      }else{
        echo '<div class="mt-3 alert alert-danger">Data insertion failed.</div>';
      }
    }
    ?>
  </div>
</body>
</html>

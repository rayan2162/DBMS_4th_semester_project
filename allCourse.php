<?php include 'connection.php'; ?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <title>Crud Operation</title>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-center">
    <h2 class="my-3">Course </h2>
    </div>
 
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Description</th>
      <th scope="col">Version</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = 'SELECT courses.id, courseName, courseDescription, versions.VersionName 
    FROM courses
    INNER JOIN versions ON courses.versionId = versions.id';
    $result=mysqli_query($conn,$query);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $courseName=$row['courseName'];
        $courseDescription=$row['courseDescription'];
        $versionName=$row['VersionName'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$courseName.'</td>
        <td>'.$courseDescription.'</td>
        <td>'.$versionName.'</td>
     </tr>';
      }
    }
    ?>
  </tbody>
</table>
  </div>
</body>
</html>
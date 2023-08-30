<?php include 'connection.php'; ?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'adminCheck.php';?>

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
    <h2 class="my-3">Course List</h2>
    </div>
  <!-- <h2 >Course List</h2> -->
    <button class="btn btn-primary my-5"><a href="coursesCreate.php" class="text-light">Add Course</a></button>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Description</th>
      <th scope="col">Version</th>
      <th scope="col">Operations</th>
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
      <td>
      <button class="btn btn-primary"><a href="courseUpdate.php?updateid='.$id.'" class="text-light">Update</a></button>
      <button class="btn btn-danger"><a href="courseDelete.php?deleteid='.$id.'" class="text-light"  onclick="return confirm("Are you sure you want to delete this course?")">Delete</a></button>
     </td>
     </tr>';
      }
    }
    ?>
  </tbody>
</table>
  </div>
</body>
</html>
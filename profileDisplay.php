<?php include 'connection.php'; ?>
<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'admincheck.php';?>

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
    <button class="btn btn-primary my-5"><a href="createcourseProfile.php" class="text-light">Add Course Profile</a></button>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">CO</th>
      <th scope="col">PO</th>
      <th scope="col">Outcomes</th>
      <th scope="col">Objectives</th>
      <th scope="col">Rationale</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
   $query='select courseprofile.id ,courses.courseName,CO,programoutcomes.PO,courseOutcomes,objects,rationale
    from courseprofile
    INNER join courses on courseprofile.courseId=courses.id
    INNER join programoutcomes on courseprofile.PO=programoutcomes.OutcomeID';
    $result=mysqli_query($conn,$query);
    if($result){
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $courseName=$row['courseName'];
        $co=$row['CO'];
        $po=$row['PO'];
        $outcomes=$row['courseOutcomes'];
        $objects=$row['objects'];
        $rationale=$row['rationale'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$courseName.'</td>
        <td>'.$co.'</td>
        <td>'.$po.'</td>
        <td>'.$outcomes.'</td>
        <td>'.$objects.'</td>
        <td>'.$rationale.'</td>
      <td>
      <button class="btn btn-primary"><a href="profileUpdate1.php?updateid='.$id.'" class="text-light">Update</a></button>
      <button class="btn btn-danger"><a href="profileDelete.php?deleteid='.$id.'" class="text-light"  onclick="return confirm("Are you sure you want to delete this course?")">Delete</a></button>
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
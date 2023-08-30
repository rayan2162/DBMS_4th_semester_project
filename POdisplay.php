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
  <title>Program Outcomes Display</title>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-center">
      <h2 class="my-3">Program Outcomes</h2>
    </div>
    <button class="btn btn-primary my-5"><a href="POcreate.php" class="text-light">Add Program Outcome</a></button>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Outcome ID</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = 'SELECT programoutcomes.OutcomeID,PO, department.deptShortName
                  FROM programoutcomes
                  INNER JOIN department ON programoutcomes.deptId = department.deptId';
        $result = mysqli_query($conn, $query);
        
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $outcomeID = $row['OutcomeID'];
            $name = $row['PO'];
            $deptShortName = $row['deptShortName'];
            
            echo '<tr>
              <th scope="row">'.$outcomeID.'</th>
              <td>'.$name.'</td>
              <td>'.$deptShortName.'</td>
              <td>
                <button class="btn btn-primary"><a href="POUpdate.php?updateid='.$outcomeID.'" class="text-light">Update</a></button>
                <button class="btn btn-danger"><a href="PODelete.php?deleteid='.$outcomeID.'" class="text-light">Delete</a></button>
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

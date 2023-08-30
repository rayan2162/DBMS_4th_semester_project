<?php include 'connection.php'; ?>

<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'admincheck.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
  <title>Version Display</title>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      padding-top: 50px;
    }
    .version-title {
      text-align: center;
      margin-bottom: 30px;
    }
    .btn-action {
      margin-right: 5px;
    }
    .table-container {
      border-radius: 10px;
      background-color: white;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="version-title">Version List</h2>
    <div class="d-flex justify-content-end mb-3">
      <a href="versionsCreate.php" class="btn btn-primary btn-action">Add Version</a>
    </div>
    <div class="table-container p-4">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Version Name</th>
            <th scope="col">Release Date</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = 'SELECT * FROM versions';
          $result = mysqli_query($conn, $query);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $versionName = $row['VersionName'];
              $releaseDate = $row['ReleaseDate'];
              $description = $row['Description'];
              echo '<tr>
              <th scope="row">' . $id . '</th>
              <td>' . $versionName . '</td>
              <td>' . $releaseDate . '</td>
              <td>' . $description . '</td>
              <td>
                <a href="versionUpdate.php?updateid=' . $id . '" class="btn btn-primary btn-action">Update</a>
                <a href="versionDelete.php?deleteid=' . $id . '" class="btn btn-danger btn-action">Delete</a>
              </td>
              </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

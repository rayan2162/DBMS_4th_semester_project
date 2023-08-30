<?php
include 'connection.php';
$id = $_GET['updateid'];
$query = "SELECT * FROM versions WHERE id = $id";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $version = $row['VersionName'];
    $releaseDate = $row['ReleaseDate'];
    $description = $row['Description'];
}

if (isset($_POST['submit'])) {
    $version = $_POST['version'];
    $releaseDate = $_POST['releaseDate'];
    $description = $_POST['description'];
    $query = "UPDATE versions SET VersionName='$version', ReleaseDate='$releaseDate', Description='$description'
    WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:versionDisplay.php');
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
    <title>Edit Version</title>
</head>
<body>
<div class="container">
    <h2>Edit Version</h2>
    <form method="post">
        <div class="form-group">
            <label for="version">Version</label>
            <input type="text" class="form-control" placeholder="Enter version name"
                   autocomplete="off" name="version"
                   value="<?php echo $version ?>">
        </div>
        <div class="form-group">
            <label for="releaseDate">Release Date</label>
            <input type="date" class="form-control"
                   autocomplete="off" name="releaseDate"
                   value="<?php echo $releaseDate ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" placeholder="Enter Version Description"
                   autocomplete="off" name="description"
                   value="<?php echo $description ?>">
        </div>
        <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
    </form>
</div>
</body>
</html>

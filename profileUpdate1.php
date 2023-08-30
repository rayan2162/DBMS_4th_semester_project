<?php
include 'connection.php';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
    $query = "SELECT * FROM courseprofile WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $objects = $row['objects'];
        $rationale = $row['rationale'];
        $name = $row['CO'];
        $outcome = $row['courseOutcomes'];
        $courseId = $row['courseId'];
    } else {
        die("Course not found.");
    }

    if (isset($_POST['submit'])) {
        $objects = $_POST['course_objectives'];
        $rationale = $_POST['rationale'];
        $name = $_POST['name'];
        $outcome = $_POST['course_outcomes'];
        $courseId = $_POST['courseId'];

        // Update the course profile in the database
        $query = "UPDATE courseprofile 
                  SET objects = '$objects', 
                      rationale = '$rationale', 
                      CO = '$name', 
                      courseOutcomes = '$outcome', 
                      courseId = $courseId 
                  WHERE id = $id";
        
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: profileDisplay.php');
            exit();
        } else {
            die("Error: " . mysqli_error($conn));
        }
    }
}
?>

<?php session_start();?>
<?php include 'isLoggedin.php';?>
<?php include 'admincheck.php';?>


<!DOCTYPE html>
<html>
<head>
  <title>Dynamic Table with Dynamic Multi-Select Dropdown</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Your styles here */
     table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .delete-btn {
      cursor: pointer;
    }

    .table-header-style {
      background-color: #f2f2f2;
      text-align: center;
      font-weight: bold;
    }

    .form-control-header {
      border: 1px solid #ccc;
      background-color: #f2f2f2;
      text-align: center;
      font-weight: bold;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
</head>
<body>
  <div class="container mt-5">
    <form method="post" >
    <div class="row">
      <div class="col-md-6">
        <div class="input-group">
          <select class="form-control" id="course-dropdown" name="courseId">
            <option selected disabled>Select Course</option>
            <?php 
            $sql = 'SELECT id, courseName, courseDescription FROM courses';
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['courseName'] . '</option>';
            }
            ?>  
          </select>
          <button class="btn btn-primary">Add Course</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <!-- Your form content here -->
     <div class="row">
      <div class="container" style="margin-bottom: 10px;">
        <label for="course-objectives" class="form-control-header">Course Objectives:</label>
        <textarea id="course-objectives" name="course_objectives" class="form-control"><?php echo $objects?></textarea>
      </div>
      <div class="container">
        <label for="rationale" class="form-control-header">Rationale:</label>
        <textarea id="rationale" name="rationale" class="form-control"><?php echo $rationale ?></textarea>
      </div>
    </div>

    <!-- Dynamic Table Section -->
    <table id="dynamic-table" class="mt-3">
      <thead>
        <tr>
          <th class="table-header-style">Name(CO's)</th>
          <th class="table-header-style">Course Outcomes</th>
          <th class="table-header-style">Options</th>
          <th class="table-header-style"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" name="name" class="form-control" value="<?php echo $name ?>"></td>
          <td><textarea name="course_outcomes" class="form-control"><?php echo $outcome ?></textarea></td>
          <td>
            <select class="form-control" name="options[][]" multiple>
             <?php 
              $sql='SELECT OutcomeID, PO from programoutcomes';
              $result=mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
              echo '<option value="'.$row['OutcomeID'].'" >'.$row['PO'].'</option>';
              }
            ?> 
            </select>
          </td>
          <td class="delete-btn" onclick="deleteRow(this)">Delete</td>
        </tr>
      </tbody>
    </table>
    <div class="text-center">
    <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
    </div>
    </form>
  </div>
</body>
</html>
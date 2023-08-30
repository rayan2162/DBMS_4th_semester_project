<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $objects = $_POST['course_objectives'];
    $rationale = $_POST['rationale'];
    $names = $_POST['name'];
    $outcomes = $_POST['course_outcomes'];
    $optionsArray = $_POST['options'];
    $courseId = $_POST['courseId']; 

    if (!empty($optionsArray)) {
        foreach ($optionsArray as $index => $rowoptions) {
            $name = isset($names[$index]) ? $names[$index] : '';
            $outcome = isset($outcomes[$index]) ? $outcomes[$index] : '';
            foreach ($rowoptions as $poId) {
                $sql = "INSERT INTO courseprofile(objects, rationale, CO, courseOutcomes, courseId, PO) VALUES ('$objects', '$rationale', '$name', '$outcome', $courseId, $poId)";
                $query = mysqli_query($conn, $sql);

                if (!$query) {
                    die("Error: " . mysqli_error($conn));
                }
            }
        }
    } else {
        // echo "Please select at least one program outcome.";
        header('location:profileDisplay.php');
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
        <textarea id="course-objectives" name="course_objectives" class="form-control"></textarea>
      </div>
      <div class="container">
        <label for="rationale" class="form-control-header">Rationale:</label>
        <textarea id="rationale" name="rationale" class="form-control"></textarea>
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
          <td><input type="text" name="name[]" class="form-control"></td>
          <td><textarea name="course_outcomes[]" class="form-control"></textarea></td>
          <td>
            <select class="form-control" name="options[][] " multiple>
             <?php 
              $sql='SELECT OutcomeID, PO from programoutcomes';
              $result=mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
              echo '<option value="'.$row['OutcomeID'].'">'.$row['PO'].'</option>';
              }
            ?> 
            </select>
          </td>
          <td class="delete-btn" onclick="deleteRow(this)">Delete</td>
        </tr>
        <tr>
          <td><input type="text" name="name[]" class="form-control"></td>
          <td><textarea name="course_outcomes[]" class="form-control"></textarea></td>
          <td>
            <select class="form-control" name="options[][] " multiple>
             <?php 
              $sql='SELECT OutcomeID, PO from programoutcomes';
              $result=mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
              echo '<option value="'.$row['OutcomeID'].'">'.$row['PO'].'</option>';
              }
            ?> 
            </select>
          </td>
          <td class="delete-btn" onclick="deleteRow(this)">Delete</td>
        </tr>
        <tr>
          <td><input type="text" name="name[]" class="form-control"></td>
          <td><textarea name="course_outcomes[]" class="form-control"></textarea></td>
          <td>
            <select class="form-control" name="options[][] " multiple>
             <?php 
              $sql='SELECT OutcomeID, PO from programoutcomes';
              $result=mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
              echo '<option value="'.$row['OutcomeID'].'">'.$row['PO'].'</option>';
              }
            ?> 
            </select>
          </td>
          <td class="delete-btn" onclick="deleteRow(this)">Delete</td>
        </tr>
        <tr>
          <td><input type="text" name="name[]" class="form-control"></td>
          <td><textarea name="course_outcomes[]" class="form-control"></textarea></td>
          <td>
            <select class="form-control" name="options[][] " multiple>
             <?php 
              $sql='SELECT OutcomeID, PO from programoutcomes';
              $result=mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
              echo '<option value="'.$row['OutcomeID'].'">'.$row['PO'].'</option>';
              }
            ?> 
            </select>
          </td>
          <td class="delete-btn" onclick="deleteRow(this)">Delete</td>
        </tr>
      </tbody>
    </table>
    <div class="mt-3">
      <button class="btn btn-primary" onclick="addRow()">Add Row</button>
    </div>
    <div class="text-center">
    <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
    </div>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
  <script>
    // Your JavaScript code here
    //  const choicesSelect = new Choices('.choices-select', {
    //   removeItemButton: true,
    //   maxItemCount: null, // Set to null to allow selecting all options
      document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add-row-button').addEventListener('click', addRow);
    event.preventDefault();
    addRow();
  });
    //});

    function addRow() {
      const table = document.getElementById('dynamic-table').getElementsByTagName('tbody')[0];
      const newRow = table.insertRow(table.rows.length);
      const cells = [
        newRow.insertCell(0),
        newRow.insertCell(1),
        newRow.insertCell(2),
        newRow.insertCell(3)
      ];

      cells[0].innerHTML = '<input type="text" name="name[]" class="form-control">';
      cells[1].innerHTML = '<textarea name="course_outcomes[]" class="form-control"></textarea>';
      cells[2].innerHTML = `
        <select class=" form-control" name="options[][]" multiple>
          <?php 
        $sql='SELECT OutcomeID, PO from programoutcomes';
        $result=mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
        echo '<option value="'.$row['OutcomeID'].'">'.$row['PO'].'</option>';
        }
       ?> 
        </select>
      `;
      cells[3].innerHTML = '<span class="btn btn-danger delete-btn" onclick="deleteRow(this.parentNode)">Delete</span>';

      // Reinitialize Choices for the new multi-select dropdown
      // new Choices(cells[2].querySelector('.choices-select'), {
      //   removeItemButton: true,
      //   maxItemCount: null,
      //   shouldSort:false,
      // });
    }

    function deleteRow(row) {
      const rowIndex = row.parentNode.parentNode.rowIndex;
      document.getElementById('dynamic-table').deleteRow(rowIndex);
    }
  </script>
</body>
</html>
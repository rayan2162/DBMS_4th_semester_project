<?php include 'connection.php'; ?>
<?php 
   $deptId =  $_REQUEST['deptId'];
   $s = "delete from department where deptId=$deptId";
   if(mysqli_query($conn, $s)){
    header('Location: allDepartment.php');
   }
?>
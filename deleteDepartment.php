<?php include 'connection.php'; ?>
<?php 
   $deptId =  $_REQUEST['deptId'];
   
   $dept = "UPDATE `user` SET `deptId`=NULL WHERE `user`.`deptId` =$deptId";
   $s = "DELETE FROM `department` WHERE `department`.`deptId` =$deptId";
   if(mysqli_query($conn, $dept, $s)){
    header('Location: allDepartment.php');
   }
?>
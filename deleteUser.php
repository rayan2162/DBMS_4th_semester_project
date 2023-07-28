<?php include 'connection.php'; ?>
<?php 
   $userId =  $_REQUEST['userId'];
   $s = "delete from user where userId=$userId";
   if(mysqli_query($conn, $s)){
    header('Location: allUser.php');
   }
?>
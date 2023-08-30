<?php include 'connection.php'; ?>
<?php 
   $UserSn =  $_REQUEST['UserSn'];
   $s = "delete from user where UserSn=$UserSn";
   if(mysqli_query($conn, $s)){
    header('Location: allUser.php');
   }
?>
<?php 
 include 'connection.php';
 if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];
    $query="DELETE FROM versions where id=$id";
    $result=mysqli_query($conn,$query);
    if($result){
      //echo "deleted";
      header('location:versionDisplay.php');
    }else{
      die(mysqli_error($conn));
    }
  }
 
?>
<?php 
 include 'connection.php';
 if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];
    $query="DELETE FROM programoutcomes where OutcomeID=$id";
    $result=mysqli_query($conn,$query);
    if($result){
     // echo "deleted";
      header('location:POdisplay.php');
    }else{
      die(mysqli_error($conn));
    }
  }
 
?>
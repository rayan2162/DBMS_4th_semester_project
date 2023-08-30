<?php 
 include 'connection.php';
 if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];
    $query="DELETE FROM courses where courses.id=$id";
    $result=mysqli_query($conn,$query);
    if($result){
     // echo "deleted";
      header('location:courseDisplay.php');
    }else{
      die(mysqli_error($conn));
    }
  }
 
?>
<?php 
 include 'connection.php';
 if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];
    $query="DELETE FROM courseprofile where courseprofile.id=$id";
    $result=mysqli_query($conn,$query);
    if($result){
     // echo "deleted";
      header('location:profileDisplay.php');
    }else{
      die(mysqli_error($conn));
    }
  }
 
?>
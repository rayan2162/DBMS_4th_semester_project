<?php 
    include 'connection.php';
    $userId = $_REQUEST['userId'];
    $s = "UPDATE user set userStatus=true where userId=$userId";
    if(mysqli_query($conn, $s)){
        header('Location: approveList.php');
    }
?>
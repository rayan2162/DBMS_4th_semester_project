<?php 
    include 'connection.php';
    $UserSn = $_REQUEST['UserSn'];
    $s = "UPDATE user set userStatus=true where UserSn=$UserSn";
    if(mysqli_query($conn, $s)){
        header('Location: approveList.php');
    }
?>
<?php
    $username = "root";
    $password = "";
    $hostname = "localhost";
    $db = "finalproject";

    $conn = mysqli_connect($hostname,$username,$password,$db);

    if(!$conn){
        die("Connection Failed".mysqli_connect_error());
    }
?>
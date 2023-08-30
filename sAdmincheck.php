<?php
    if($_SESSION['role']=="admin"){
        header('location : dashboard.php');
    }
    
?>
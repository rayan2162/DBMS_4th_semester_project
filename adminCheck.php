<?php
    if($_SESSION['role']!="admin"){
        header('location : superAdminDasshboard.php');
    }
    
?>
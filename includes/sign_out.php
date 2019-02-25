<?php
    if(isset($_POST['submit'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
    if(isset($_POST['admin-sign-out'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../admin/sign-in.php");
        exit();
    }

    
?>
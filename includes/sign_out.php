<?php
    if(isset($_POST['submit'])){
        // Initialize the session
        session_start();
        // Unset all of the session variables
        session_unset();
        // Destroy the session.
        session_destroy();
        // Redirect to main page
        header("Location: ../index.php");
        exit();
    }
    if(isset($_POST['admin-sign-out'])){
        // Initialize the session
        session_start();
        // Unset all of the session variables
        session_unset();
        // Destroy the session.
        session_destroy();
        // Redirect to admin sign-in page
        header("Location: ../admin/sign-in.php");
        exit();
    }

    
?>
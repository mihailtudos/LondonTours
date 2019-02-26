<?php

//check if the button submit was clicked otherwise do not process data and send the user back to the registration page
session_start();

    date_default_timezone_set('Europe/London');
    $date = date('Y-m-d', time());
    
if(isset($_POST['submit'])){
    include_once 'db_inc.php';
    
    
    $subject = mysqli_real_escape_string($connection, trim($_POST['subject']));
    $message = mysqli_real_escape_string($connection, trim($_POST['message']));
    $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);
    if(isset($_SESSION['userID'])==false){
        $query = "SELECT * FROM `_users_` where _privileges_ = 1";
        $results = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($results);
        $userID = $row['_user_id_'];
    }else{
        $userID = $_SESSION['userID'];
    }

    $sql = "INSERT INTO `_support_req_` (
        `_id_`, 
        `_userID_`, 
        `_phoneNumber_`, 
        _subject_, 
        _message_, 
        _date_) 
        VALUES (
        NULL, 
        $userID, 
        $phoneNumber, 
        '$subject', 
        '$message', 
        '$date')";
    mysqli_query($connection, $sql);
    //error handlers
    //check for empty fields
        //header("Location: ../index.php?index=1");
        //exit();
     	
	header("Location: ../index.php?index=1");
        exit();

    } else {
        header("Location: ../index.php?index=0");
        exit();
    }   


?>
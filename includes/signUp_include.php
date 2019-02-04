<?php

//check if the button submit was clicked otherwise do not process data and send the user back to the registration page

if(isset($_POST['submit'])){
    include_once 'db_inc.php';

    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $secondName = mysqli_real_escape_string($connection, $_POST['secondName']);
    //hashing the password 
    $password =  password_hash(mysqli_real_escape_string($connection, $_POST['password']), PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);
    $street = mysqli_real_escape_string($connection, $_POST['street']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $postcode = mysqli_real_escape_string($connection, $_POST['postcode']);


    //error handlers
    //check for empty fields

    if(empty($firstName) || empty($secondName) || empty($password) || empty($email) || empty($phoneNumber) || empty($street) || empty($city) || empty($postcode)){
        header("Location: ../registration.php?registration=empty");
        exit();
    } else {
        //check if the input is valid 
        if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $secondName) ) {
            header("Location: ../registration.php?registration=invalid");
            exit();
        }else{
            //check if the email is  valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../registration.php?registration=email");
                exit();
            }else{
                $query = "SELECT * FROM _users_ WHERE _user_email_ = '$email'";
                $results = mysqli_query($connection, $query);
                $matchesFound = mysqli_num_rows($results);

                if($matchesFound > 0){
                    header("Location: ../registration.php?registration=userTaken");
                    exit();
                }else {
                    //hashing the password
                    //insert data into db 
                    $sql = "INSERT INTO _users_(
                        _user_first_name_, 
                        _user_last_name_, 
                        _user_email_,
                        _user_phone_no_, 
                        _user_street_, 
                        _user_city_, 
                        _user_postcode_,
                        _user_password_) 
                    values (
                       ' $firstName',
                        '$secondName',
                        '$email',
                        '$phoneNumber',
                        '$street',
                        '$city',
                        '$postcode',
                        '$password');";
                    mysqli_query($connection, $sql);
                    header("Location: ../registration.php?registration=success");
                    exit();
                }
            }
        }
    }


} else {
    header("Location: ../registration.php");
    exit();
}


?>
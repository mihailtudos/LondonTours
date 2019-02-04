<?php
session_start();

if(isset($_POST['submit'])){


    include 'db_inc.php';

    //treats the entered details strictly as text for security purpose

    $userEmail = mysqli_real_escape_string($connection, $_POST['_user_email_']);
    $userPassword = mysqli_real_escape_string($connection, $_POST['_user_password_']);

    //error handler
    //check if inputs are empty

    if (empty($userEmail) || empty($userPassword)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        //check if user exists in db
        $query = "SELECT * FROM _users_ WHERE _user_email_ = '$userEmail';"; 
        //running the query in db 
        $result = mysqli_query($connection, $query);
        //check is something was returned 
        $checkUserFound = mysqli_num_rows($result);
        if($checkUserFound < 1){
            header("Location: ../index.php?login=error1");
            exit();
        } else {
            //as user was found 
            if($rowResult = mysqli_fetch_assoc($result));
            //de-hashing the password
            $hashedPassCheck = password_verify($userPassword, $rowResult['_user_password_']);
            if($hashedPassCheck == false){
                header("Location: ../index.php?login=error2");
                exit();
            } elseif ($hashedPassCheck == true) {
                //login the user using the session super-global to keep the user credentials available on all the pages as long as the session is active 
                $_SESSION['userID'] = $rowResult['_user_id_'];
                $_SESSION['userFirstName'] = $rowResult['_user_first_name_'];
                $_SESSION['userLastName'] = $rowResult['_user_last_name_'];
                $_SESSION['userEmail'] = $rowResult['_user_email_'];
                $_SESSION['userPhone'] = $rowResult['_user_phone_no_'];
                $_SESSION['userStreet'] = $rowResult['_user_street_'];
                $_SESSION['userCity'] = $rowResult['_user_city_'];
                $_SESSION['userPostcode'] = $rowResult['_user_postcode_'];
                header("Location: ../index.php?login=success");
                exit();
            }
        }
    }
        
} else {
        header("Location: ../index.php?login=error3");
        exit();
}

	// if(isset($_SESSION['userID'])){
	// 	echo "you are logged in";
	// }


?>
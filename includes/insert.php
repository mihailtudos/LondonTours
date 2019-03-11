<?php
//checks where the request is coming
if(isset($_POST['submit']) || isset($_POST['save'])){
    //call addBooking function which takes a boolean parameter 
    //if the parameter is true then create a new booking 
    $booking = true;
    addBooking($booking);
} elseif(isset($_POST['buyNow'])){
    //call addBooking function which takes a boolean parameter 
    //if the parameter is true then create a new booking
    $booking = true; 
    addBooking($booking);    
} else{
    //redirect back if the page is accessed without above buttons being pressed 
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}


function addBooking($booking){
    //if the call is true 
    if($booking){
    //starts session include database  
    session_start();
    include 'db_inc.php';
     //data validation and sanitation
    $ticketOption = trim(mysqli_real_escape_string($connection, $_POST['tour']));
    //if the booking tour option was was chosen by title then get the tour id from db
    $query                  = "SELECT _id_ FROM `_tours_` WHERE _title_ = '$ticketOption'";
									$results = mysqli_query($connection, $query);
                                    $ticketOption = mysqli_fetch_assoc($results);
                                    
    $optionTour             = $ticketOption['_id_'];
    $firstName              = trim(mysqli_real_escape_string($connection, $_POST['firstName']));
    $secondName             = trim(mysqli_real_escape_string($connection, $_POST['secondName']));
    $email                  = trim(mysqli_real_escape_string($connection, $_POST['email']));
    $phoneNumber            = trim(mysqli_real_escape_string($connection, $_POST['phoneNumber']));
    $street                 = trim(mysqli_real_escape_string($connection, $_POST['street']));
    $city                   = trim(mysqli_real_escape_string($connection, $_POST['city']));
    $postcode               = trim(mysqli_real_escape_string($connection, $_POST['postcode']));
    $reservationDate        = trim(mysqli_real_escape_string($connection, $_POST['date']));
    $currentDate            = date("Y-m-d"); //creates current date to compare with the booked date
    $numberOfReservations   = trim(mysqli_real_escape_string($connection, $_POST['number']));
    //if the booking was made by the user then get the id of user through session variable 
    $user_id                = $_SESSION['userID'];                 
     //check if user exists in db
     $query                  = "SELECT _user_id_ FROM `_users_` WHERE _users_._user_email_ = '$email'";
     //running the query in db 
     $result = mysqli_query($connection, $query);
     //check is something was returned and assiging user id for further use
     $checkUserFound = mysqli_num_rows($result);
     if($checkUserFound > 0){
         $rowResult = mysqli_fetch_assoc($result);
         $user_id = $rowResult['_user_id_'];
     }

    //double check if the fields are empty, if any found empty send the user back to the booking page
    if(empty($firstName) || empty($secondName) || empty($email) || 
        empty($phoneNumber) || empty($street) || empty($city) || empty($postcode)){
        header("location:javascript://history.go(-1)");
        exit();
    } else {
        //check if input have specific format is valid 
        if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $secondName) 
            || !preg_match("/^[a-zA-Z]*$/", $city) ) {
            header("location:javascript://history.go(-1)");
            exit();
        }else{//check if email has correct format
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("location:javascript://history.go(-1)");
                exit();
            }else{//check if booking date is not in the past
                if($reservationDate <= $currentDate){
                    header("location:javascript://history.go(-1)");
                    exit();
                    
                }else{//if the insert is coming from edit option then execut this sql query
                       if(isset($_POST['save'])){
                        //prepare the sql query    
                        $sql = "UPDATE `_booked_guided_tours_` 
                        SET `_tour_id_` = '$optionTour', 
                        `_date_` = '$reservationDate', 
                        `_number_of_tickets_` = '$numberOfReservations', 
                        `book_date` = CURRENT_TIMESTAMP, 
                        `_contact_email_` = '$email', 
                        `_contact_number_` = '$phoneNumber', 
                        `_address_` = '$street', 
                        `_city_` = '$city', 
                        `_postcode_` = '$postcode' 
                        WHERE `_booked_guided_tours_`.`_id_` = '$bookingID';
                        ";
                        //execut the sql query and return back 
                        mysqli_query($connection, $sql);
                        //check if the row was inserted 
                            if (mysqli_affected_rows($connection)){
                            $_SESSION['booked'] = 'Successfully booked';
                            // Close connection
                            mysqli_close($connection);
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            exit();
                            }else{
                                //if no record inserted go back to the form 
                                header("location:javascript://history.go(-1)");
                                exit(); 
                            }
                    }else{
                        $sql = " INSERT INTO `_booked_guided_tours_` 
                        (`_id_`, `_tour_id_`, `_user_id_`, `_date_`, `_number_of_tickets_`, `book_date`, `_contact_email_`, `_contact_number_`, `_address_`, `_city_`,`_postcode_`) 
                        VALUES (NULL, '$optionTour' , '$user_id', '$reservationDate', '$numberOfReservations', CURRENT_TIMESTAMP, ' $email', '$phoneNumber', '$street', '$city', '$postcode');";
                        mysqli_query($connection, $sql);
                            if (mysqli_affected_rows($connection)){
                                $_SESSION['booked'] = 'Successfully booked';
                                // Close connection
                                mysqli_close($connection);
                                header('Location: ' . $_SERVER['HTTP_REFERER']);
                                exit();
                            }else{
                                //if no record inserted go back to the form 
                                header("location:javascript://history.go(-1)");
                                exit(); 
                            }
                    }                
               
                }

            }
        }
    }
    //sestorys the session 
    session_destroy();
}else{
    //if no record inserted go back to the form 
    header("location:javascript://history.go(-1)");
    exit(); 
    }
}


?>
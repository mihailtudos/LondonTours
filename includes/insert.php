<?php 

if(isset($_POST['submit']) || isset($_POST['save'])){
    $booking = true;
    addBooking($booking);
}elseif(isset($_POST['buyNow'])){

}


function addBooking($booking){
    if($booking){
    session_start();
    include 'db_inc.php';
    $bookingID  = $_GET['id'];

     //data validation and sanita
    $ticketOption = trim(mysqli_real_escape_string($connection, $_POST['tour']));

    $query                  = "SELECT _id_ FROM `_tours_` WHERE _title_ = '$ticketOption'";
									$results = mysqli_query($connection, $query);
                                    $ticketOption = mysqli_fetch_assoc($results);
                                    
    $optionTour             = $ticketOption['_id_'];
    $firstName              = trim(mysqli_real_escape_string($connection, $_POST['firstName']));
    $secondName             = trim(mysqli_real_escape_string($connection, $_POST['secondName']));
    //hashing the password 
    $email                  = trim(mysqli_real_escape_string($connection, $_POST['email']));
    $phoneNumber            = trim(mysqli_real_escape_string($connection, $_POST['phoneNumber']));
    $street                 = trim(mysqli_real_escape_string($connection, $_POST['street']));
    $city                   = trim(mysqli_real_escape_string($connection, $_POST['city']));
    $postcode               = trim(mysqli_real_escape_string($connection, $_POST['postcode']));
    $reservationDate        = trim(mysqli_real_escape_string($connection, $_POST['date']));
    $currentDate            = date("Y-m-d");
    $numberOfReservations   = trim(mysqli_real_escape_string($connection, $_POST['number']));

    $user_id                = $_SESSION['userID'];

    //if the booking is requested by the admin then we check if the user is reqistred if not we reqister it befor bookin the request
                 
     //check if user exists in db
     $query                  = "SELECT _user_id_ FROM `_users_` WHERE _users_._user_email_ = '$email'";
     //running the query in db 
     $result = mysqli_query($connection, $query);
     //check is something was returned 
     $checkUserFound = mysqli_num_rows($result);
     if($checkUserFound > 0){
         //de-hashing the password
         $rowResult = mysqli_fetch_assoc($result);
         $user_id = $rowResult['_user_id_'];
     }

     
     echo $user_id;
     echo $street;
    //double check if the fields are empty, if any found empty send the user back to the booking page
    if(empty($firstName) || empty($secondName) || empty($email) || empty($phoneNumber) || empty($street) || empty($city) || empty($postcode)){
        header("Location: ..\admin\bookings.php?registration=empty");
        exit();
    } else {
        //check if the input is valid 
        if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $secondName) || !preg_match("/^[a-zA-Z]*$/", $city) ) {
            header("Location: ../registration.php?registration=invalid");
            exit();
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../registration.php?registration=email");
                exit();
            }else{
                if($reservationDate <= $currentDate){
                    header("Location: ..\admin\bookings.php?registration=date");
                    exit();
                }else{

                    //$query = "SELECT * FROM _users_ WHERE _user_email_ = '$email';"; 
                    //running the query in db 
                    //$result = mysqli_query($connection, $query);
                    //check is something was returned 
                   // $checkUserFound = mysqli_num_rows($result);
                    //if($checkUserFound > 0){
                
                        //$rowResult = mysqli_fetch_assoc($result);
                       // $user_id = $rowResult['_user_id_'];
                       if(isset($_POST['save'])){
                            
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
                        mysqli_query($connection, $sql);
                        header("Location: ..\admin\bookings.php?booking=success");
                        exit();
                    }else{
                        $sql = " INSERT INTO `_booked_guided_tours_` 
                        (`_id_`, `_tour_id_`, `_user_id_`, `_date_`, `_number_of_tickets_`, `book_date`, `_contact_email_`, `_contact_number_`, `_address_`, `_city_`,`_postcode_`) 
                        VALUES (NULL, '$optionTour' , '$user_id', '$reservationDate', '$numberOfReservations', CURRENT_TIMESTAMP, ' $email', '$phoneNumber', '$street', '$city', '$postcode');
                        ";
                        mysqli_query($connection, $sql);
                        header("Location: ..\admin\bookings.php?booking=success");
                        exit();
                    }                
               
                }

            }
        }
    }
    }elseif(isset($_POST['save'])) {
        
    }else{

    }
}


?>
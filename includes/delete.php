<?php 
//includes database connection script 
include 'db_inc.php';
//checks is the id and the action was sent
if(isset($_GET['id']) && isset($_GET['action'])){
    //assign the values.
    $id     = mysqli_real_escape_string($connection, trim($_GET['id']));
    $action = mysqli_real_escape_string($connection, trim($_GET['action']));
    //checks if the request is coming from customer bookings
    if($action == "booking"){
    //if the request is sent by the admin then create an sql statement and delete the booking
    $query = "DELETE FROM `_booked_guided_tours_` WHERE `_booked_guided_tours_`.`_id_` = ?;";
    //prepare the sql statement
    if($stmt_query = mysqli_prepare($connection, $query)){
        //create parameters
        mysqli_stmt_bind_param($stmt_query, "d", $book_id);
        //assign the value to sql parameter
        $book_id = $id;
        //is succesfully executed delete the item
        if(mysqli_stmt_execute($stmt_query)){
            header("Location: ../admin/bookings.php?bookings=itemDeleted");
            exit();
        }
    }	
    //distroy the sql statement 
    mysqli_stmt_close($stmt_query);
    }
    //close MySQL connection 
    mysqli_close($connection);
}
?>



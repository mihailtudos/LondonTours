<?php 
include 'db_inc.php';

$id = $_GET['id'];
$action = $_GET['action'];

echo ' ';

if($action == "booking"){
echo $id . '<br>';
echo $action;

$query = "DELETE FROM `_booked_guided_tours_` WHERE `_booked_guided_tours_`.`_id_` = '$id';";
mysqli_query($connection, $query);
header("Location: ../admin/bookings.php?bookings=itemDeleted");
exit();
//mysql_query("DELETE from purchase WHERE id='$id'");

}


?>
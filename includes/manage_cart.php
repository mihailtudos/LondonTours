<?php
include 'db_inc.php';
session_start();
if(isset($_GET['id']) & isset($_GET['action']) & $_GET['action'] == 'remove'){
    $id = $_GET['id'];
    $action = $_GET['action'];
	$query = "DELETE FROM `_temp_cart` WHERE `_temp_cart`.`_id_` = '$id'";
    mysqli_query($connection, $query);
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
}

?>
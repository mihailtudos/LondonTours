<?php
include 'db_inc.php';
session_start();
$id = $_GET['id'];
$action = $_GET['action'];

$initialSize = 0;
$initialSize = sizeof($_SESSION['cart']);

switch($action){
    case 1:
        remove($id, $initialSize);
        break;
    default:
        header("Location: ../index.php?login=error2");
}



function remove($id, $initialSize){
    $index = array_search($id, $_SESSION['cart']);
    unset($_SESSION['cart'][$index]);
}


?>
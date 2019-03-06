<?php
session_start();
include 'db_inc.php';

if(isset($_POST['addItem'])){

    
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $number = mysqli_real_escape_string($connection, $_POST['number']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    
    if(!empty($id) && !empty($number) && !empty($date)){
        $querry = "INSERT INTO `_temp_cart` (`_item_id_`, `_title_`, `_number_`, `_date_`) VALUES ('$id', '$title', '$number', '$date');";
        mysqli_query($connection, $querry);
        $_SESSION['added'] = true;
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    }else{
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        $_SESSION['added'] = true;
    }

}else{

    $_SESSION['number'] = 1;
if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $_POST["itmeID"]);
if(empty($_POST["itmeID"])) {
    echo "<span style='color:red; font-size: 20px; margin: 0 0 20px 7px;'> Something went wrong please try again</span>";
} else{
    echo "<span  style='color: green; font-size: 20px; margin: 0 0 20px 7px;'>Item successfully added into the cart.</span>     
    <a href='cart.php' type='button' data-toggle='modal' data-target='#cart'>view cart</a>";
}
}



?>

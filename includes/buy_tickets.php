<?php
session_start();
$_SESSION['number'] = 1;

if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $_POST["itmeID"]);
if(empty($_POST["itmeID"])) {
    echo "<span style='color:red; font-size: 20px; margin: 0 0 20px 7px;'> Something went wrong please try again</span>";
} else{
    echo "<span  style='color: green; font-size: 20px; margin: 0 0 20px 7px;'>Item successfully added into the cart.</span>     
    <a href='cart.php'>view cart</a>";
}

?>

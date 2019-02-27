<?php
session_start();

if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_POST["itmeID"]);
echo  $_POST["itmeID"];

//header("Location: ../check-out.php");
//exit();

if(empty($_POST["itmeID"])) {
    echo "<span style='color:red'> Something went wrong please try again</span>";
} else{
    echo "<span  style='color:green; font-size:20px'>Item successfully added into the cart.</span>     
    <a href='cart.php'>view cart</a>";
    foreach ($_SESSION['cart'] as $value)
    echo $value;
}

?>

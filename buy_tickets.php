<?php
session_start();

if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}


array_push($_SESSION['cart'], $_GET['id']);
?>


<p>Success
    <a href="cart.php">view cart</a>
</p>
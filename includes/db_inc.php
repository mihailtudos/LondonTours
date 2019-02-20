<!-- File that keeps the database conection -->
<?php

//server address -localhost since we work on local host
$dbServerName = "localhost";
//user name
$dbUserName = "webOperator";
//password
$dbPassword = "Roehampton123";
//database name 
$dbName = "_london_tours";

// database connection, it uses the function mysqli_connection with the parameters defined above to connect to the databse
$connection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);


?>
<?php 
include 'includes/db_inc.php';


$query = 'SELECT DATABASE()';
$results = mysqli_query($connection, $query);
//number of rows returned after the query executed 
$queryResults = mysqli_num_rows($results);
if($queryResults > 0){
  $row = mysqli_fetch_assoc($results);
  echo $row['DATABASE()'];
}
?>
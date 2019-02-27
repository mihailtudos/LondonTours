
<?php 
require_once("db_inc.php");
// code admin email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$query ="SELECT _user_email_ FROM _users_ WHERE _user_email_= '$email'";
        $results = mysqli_query($connection, $query);
 //number of rows returned after the query executed 
 $queryResults = mysqli_num_rows($results);
if($queryResults > 0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{

	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}


?>

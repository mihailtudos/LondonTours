<?php include 'header.php'?>


<section class="main_container">
	<div class="container-fluid text-center">
		<h2>Registration</h2>
	</div>

	<div class="container-fluid">
		<!-- <form class="sign-up-form" action="includes/signUp_include.php" method="POST" autocomplete="off">
			<img src="img/reg_img.jpg" alt="registration banner">
			<input type="text" name="firstName" placeholder="First name">
			<input type="text" name="secondName" placeholder="Second name">
			<input type="password" name="password" placeholder="password">
			<input type="email" id="email"  onBlur="checkAvailability()" name="email" placeholder="example@example.com">
			<div id="user-availability-status" style="font-size:12px;"></div> 
			<input type="number" name="phoneNumber" placeholder="0734121321">
			<input type="text" name="street" placeholder="first line address">
			<input type="text" name="city" placeholder="city">
			<input type="text" name="postcode" placeholder="post code"> 
			<button id="submit" class="btn btn-primary" type="submit" name="submit">Sing up</button>
		</form>-->
		<script>
			function checkAvailability() {
			jQuery.ajax({
			url: "includes/check_email.php",
			data:'emailid='+$("#email").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status").html(data);
			},
			error:function (){}
			});
			}
			</script>
	</div>
</section>
<?php
	//Form validation 
	// Include databese connection file
	require_once "includes/db_inc.php";

	// Initialize with empty values required variables
	$email = $password = $firstName = $secondName = $phoneNumber = $street = $city = $postcode = '';
	$email_err = $password_err = $fn_err = $sn_err = $ph_err = $str_err = $city_err = $pc_err = '';
	$_SESSION['registred'] = false;
	
	//Processing from request if they were submited through post method
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//Email validation 
		if(empty(trim($_POST['email'])) && filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email_err = "Please enter a valid email"; 
		}else{
			//Prepare an SQL statement for execution
			$query = 'SELECT _user_id_ FROM _users_ WHERE _user_email_ = ?';
			
			//Processing if the the statement is ready for execution 
			if($stm_query = mysqli_prepare($connection, $query)){
				//Binds variables to a prepared statement as parameters
				mysqli_stmt_bind_param($stm_query, "s", $email_param);

				//Assign the parameters
				$email_param = mysqli_real_escape_string($connection, strtolower(trim($_POST["email"])));

				//Attempt to execute the prepared statement
				if(mysqli_stmt_execute($stm_query)){
					//store data retrived form db
					mysqli_stmt_store_result($stm_query);

					//check if something was retruned
					if(mysqli_stmt_num_rows($stm_query) > 0){
						//if something was returned then display this error message
						$email_err = "This email is already taken";
					} else{
						//if nothing returned (email is not taken) assign the email to its variable 
						$email = strtolower(trim($_POST["email"]));
					}
				}else{
					//if the statment was not executed display error message
					echo 'Something went wrong';
				}
			}
			// Close statement
			mysqli_stmt_close($stm_query);
		}

		//password validation
		if(empty(trim($_POST['password']))){
			//if password is empty prompt error
			$password_err = 'Please enter a password';
		} elseif (strlen(trim($_POST['password'])) < 8){
			//if password less than 8 characters prompt erros
			$password_err = '<br> Password must be at least 8 characters';
		} else {
			//in case all requirements were met assing take entered pw
			$password = trim($_POST['password']);
		}
		
		//first name and second name validation
		if(!empty(trim($_POST['firstName']))){
			if (!preg_match("/^[a-zA-Z]*$/", $_POST['firstName'])) {
				$fn_err = 'Incorrect name format';
			} else{
				$firstName = ucfirst(mysqli_real_escape_string($connection, trim($_POST["firstName"])));
			} 
		}else{
			$fn_err = 'Enter a first name';
		}

		//second name validation 
		if(!empty(trim($_POST['secondName']))){
			if (!preg_match("/^[a-zA-Z]*$/", $_POST['secondName'])) {
				$sn_err = 'Incorrect name format';
			} else{
				$secondName = ucfirst(mysqli_real_escape_string($connection, trim($_POST["secondName"])));
			} 
		}else{
			$sn_err = 'Enter a second name';
		}

		//phone number validation 
		if(empty(trim($_POST['phoneNumber']))){
			//if phone number is empty prompt error
			$ph_err = 'Please enter a phone number';
		} elseif (strlen(trim($_POST['phoneNumber'])) < 8 || $_POST['phoneNumber'][0] != '0'){
			//if phoneNumber does not start with 0 and is less then 8 charachters
			$ph_err = 'Incorrect number format';
		} else {
			//in case all requirements were met assing take entered pw
			$phoneNumber = mysqli_real_escape_string($connection, trim($_POST['phoneNumber']));
		}

		///address validation 
		if(!empty(trim($_POST['street']))){
				//Uppercase the first character of each word in a string
				$street = ucwords(mysqli_real_escape_string($connection, trim($_POST["street"])));
		}else{
			//prompt error
			$sn_err = 'Enter an address';
		}

		//city validation 
		if(!empty(trim($_POST['city']))){
			if (!preg_match("/[a-zA-Z]/", $_POST['city'])) {
				$city_err = 'Incorrect city name';
			} else{
				$city = ucwords(mysqli_real_escape_string($connection, trim($_POST["city"])));
			} 
		}else{
			$city_err = 'Enter a city name';
		}

		//post code validation 
		if(!empty(trim($_POST['postcode']))){
			$postcode = strtoupper(mysqli_real_escape_string($connection, trim($_POST["postcode"])));
		}else{
			$pc_err = 'Enter a post code';
		}

		// Check input errors before inserting in database
		if(!empty($email) && !empty($firstName) && !empty($secondName) && !empty($password) && !empty($phoneNumber) 
		&& !empty($street) && !empty($city) && !empty($postcode)){
			// Prepare an insert statement
			$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
			$query = "INSERT INTO `_users_` 
					(`_user_first_name_`, 
					`_user_last_name_`, 
					`_user_email_`, 
					`_user_phone_no_`, 
					`_user_street_`, 
					`_user_city_`, 
					`_user_postcode_`, 
					`_user_password_`, 
					`_privileges_`) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);"; 

			if($stmt_query = mysqli_prepare($connection, $query)){
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt_query, "sssssssss", $user_first_name, $user_second_name, $user_email, 
				$user_number, $user_street, $user_city, $user_postcode, $user_password, $user_provilege);
				// Set parameters
				$user_first_name 		= $firstName;
				$user_second_name 		= $secondName;
				$user_email 			= $email;
				$user_number 			= $phoneNumber;
				$user_street 			= $street;
				$user_city 				= $city;
				$user_postcode 			= $postcode;
				// Creates a password hash
				$user_password 			= password_hash($password, PASSWORD_DEFAULT);
				$user_provilege 		= '0';
				
				// Attempt to execute the prepared statement
				if(mysqli_stmt_execute($stmt_query)){
					// Redirect to login page
					$_SESSION['registred'] = true;
					filter_var_array($_POST, FILTER_SANITIZE_STRING); //just an example filter
					header("Location: index.php");
					exit; // Location header is set, pointless to send HTML, stop the script					
				} else{
					echo "Something went wrong. Please try again later.";
				}
			}
			 
			// Close statement
			mysqli_stmt_close($stmt_query);
		}
		
		// Close connection
		mysqli_close($connection);

	}
?>

<!-- form section; keeps the form more consistent and help to style it -->
<section class="main_container wrapper-register">
	<!-- places the text and the form in the middle of the page -->
	<div class="text-center">
		<!-- the image banner -->
	<img src="img/reg_img.jpg" alt="registration banner">
		<p>Please fill this form to create an account.</p>
	</div>
	<!-- form that will send the inputs to itself via post method -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation" novalidate id='myForm'>

	<div class="row">
				<div class="col-md-6 mb-3">
					<!-- div of the input that groups the label and the input; has attached a class that appear if input is wrong-->
					<div class="form-group <?php echo (!empty($fn_err)) ? 'has-error' : ''; ?>">
						<!-- field label -->
						<label>First name</label>
						<!-- the input that has the value of previous input, is requred and has own type and name -->
						<input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>" required>
						<!-- span that will appear when an error message has been encountered accordingly to the input type-->
						<span class="help-block"><?php echo $fn_err; ?></span>
					</div>
				</div>
					<div class="col-md-6 mb-3">
						<div class="form-group <?php echo (!empty($sn_err)) ? 'has-error' : ''; ?>">
						<label>Second name</label>
						<input type="text" name="secondName" class="form-control" value="<?php echo $secondName; ?>" required>
						<span class="help-block"><?php echo $sn_err; ?></span>
					</div>
				</div>
			</div>
			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email"  id="email"  onBlur="checkAvailability()" name="email" class="form-control" value="<?php echo $email; ?>" required>
				<span class="help-block has-error"><?php echo $email_err; ?></span>
				<div id="user-availability-status" style="font-size:12px;"></div> 
			</div>
			<div class="row">
				<div class="col-md-6 mb-3">
					<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<label>Password</label>
						<input type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
						<small class="text-muted">Password must contain at least 8 characters</small>
						<span class="help-block"><?php echo $password_err; ?></span>
					</div>
				</div>
				<div class="col-md-6 mb-3">	
					<div class="form-group <?php echo (!empty($ph_err)) ? 'has-error' : ''; ?>">
						<label>Phone number</label>
						<input id="numbersonly" type="number" name="phoneNumber" class="form-control" value="<?php echo $phoneNumber; ?>" required>
						<span class="help-block"><?php echo $ph_err; ?></span>
					</div>
				</div>
			</div>    	
			<div class="form-group <?php echo (!empty($str_err)) ? 'has-error' : ''; ?>">
                <label>First line address</label>
                <input type="text" name="street" class="form-control" value="<?php echo $street; ?>" required>
                <span class="help-block"><?php echo $str_err; ?></span>
			</div>
			<div class="row">
				<div class="col-md-6 mb-3">	
					<div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
						<label>City</label>
						<input type="text" name="city" class="form-control" value="<?php echo $city; ?>" required>
						<span class="help-block"><?php echo $city_err; ?></span>
					</div>
				</div>
				<div class="col-md-6 mb-3">	
					<div class="form-group <?php echo (!empty($pc_err)) ? 'has-error' : ''; ?>">
						<label>Post code</label>
						<input type="text" name="postcode" class="form-control" value="<?php echo $postcode; ?>" required>
						<span class="help-block"><?php echo $pc_err; ?></span>
					</div>
				</div>
			
				<div class="form-group">
					<!-- reset and submit button -->
					<input type="submit" class="btn btn-primary" value="Submit">
					<input type="reset" class="btn btn-default" value="Reset">
				</div>
			</div>
			<!-- text that allow the user to login if and accoun already exist -->
            <p>Already have an account? <a href="#" data-toggle="modal" data-target="#loginForm">Log in</a></p>
        </form>
	</div>
</section>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

document.getElementById('numbersonly').addEventListener('keydown', function(e) {
    var key   = e.keyCode ? e.keyCode : e.which;

    if (!( [8, 9, 13, 27, 46, 110, 190].indexOf(key) !== -1 ||
         (key == 65 && ( e.ctrlKey || e.metaKey  ) ) || 
         (key >= 35 && key <= 40) ||
         (key >= 48 && key <= 57 && !(e.shiftKey || e.altKey)) ||
         (key >= 96 && key <= 105)
       )) e.preventDefault();
});

function checkAvailability() {
			jQuery.ajax({
			url: "includes/check_email.php",
			data:'emailid='+$("#email").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status").html(data);
			},
			error:function (){}
			});
			}
</script>

<?php include 'footer.php'?>
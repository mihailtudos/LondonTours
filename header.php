<?php
ob_start();
//keep the session as long the user didn't press sing out
session_start();
?>
<!-- file type HTML -->
<!DOCTYPE html>
<!-- semantic language of the file english -->
<html lang="en">
	<!-- HEADER START -->
<head>
	<!-- Characters set  -->
	<meta charset="utf-8">
	<!-- Port view for scale devices with width 1 for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Website title -->
	<title>London Tours</title>
	<!-- Bootstrap CDN connection -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery latest version CDN connection -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- popper js latest version CDN connection -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- bootstrap minified latest version CDN connection -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- fontawesome (icons) latest version CDN connection -->
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!-- local CSS file -->
	<link  rel="stylesheet" href="css/style.css">
</head>
<!-- HEADER END -->
<!-- BODY START -->

<body>
	<header>

		<!-- Navigation -->
		<div class="container">
		<nav id="navbarSearch" class="navbar navbar-light fixed-top">	
			<a href="#ticket-section" id="skip" alt="skip to main content link" >Skip to main content </a>
			<a class="chat-with-us" data-toggle="modal" data-target="#chat"><i class="fas fa-comment"></i> Chat</a>

			<!-- search form and input which will send the input to search-main.php page via post method -->
				<form class="form-inline" action="search-main.php" method="POST" autocomplete="off">
					 <div id="search-box-main" class="input-group">
						<div class="input-group-prepend">
						<button type="submit" name="btn-search-main" ><div class="input-group-text"><i class="fa fa-search"></i></div></button>
						</div>
						<input name="search-main" type="search" class="form-control " id="inlineFormInputGroupSearch" placeholder="Search" min="3" required>
					</div>
			</form>

			<div id="refresh">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">
				<i class="fas fa-cart-plus"></i> <span class="badge badge-light">
					<?php
					include 'includes/db_inc.php';
								if(!isset(($_SESSION['cart']))){
									echo '0';
								}elseif (empty($_SESSION['cart'])){
									echo '0';
								}
								else{
									echo(sizeof($_SESSION['cart']));
								}
				?>
				</span>
				</button>
			</div>
		</nav>
		</div>
		<!-- navbar menu that will expand at the break point medium (md) devices (tablets, 768px and up)
		@media (min-width: 768px) { ... } the color of the navbar is light and will slick to the top of the page untill specified a break point where it will go away-->
		<nav id="navbarDiv-bar" class="navbar navbar-expand-md navbar-light fixed-top">
			<!-- By using container-fluid bootstrap class navbar content will take the entier screen size -->
			<div class="container-fluid">
				<!-- here is defined the brand (logo) of our website -->
				<a class="navbar-brand" href="index.php" >
					<!-- the logo image -->
					<p>London Tours <i class="fas fa-map-signs brand-icon"></i></p>
				</a>
				<!-- Collapsing button tipical for small devices and mediu devices. The menu is not going to take the entire width of the screen -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
					<!-- create icon of the collapsed menu tipicaly 3 lines as we use to see on devices -->
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- here is the div with the navbar content which will also collapse when website is opened on small devices due to navbarResponsive id tag -->
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<!-- navbar elements structured in a unordered list and using ml-auto will push the elements on the right hand side of the page -->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a id="active-home" class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" name="gifts" href="shop.php?id=gifts">Gifts</a>
								<a class="dropdown-item" name="souvenirs" href="shop.php?id=souvenirs">Souvenirs</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="londing_page.php">Personalize</a>
							</div>
						</li>			
						<li class="nav-item dropdown">
							<a id="active-ticket dropdownTickets" class="nav-link dropdown-toggle" role="button" href="tickets.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ticket-alt"></i>Tickets</a>
							<div class="dropdown-menu" aria-labelledby="dropdownTickets">
								<a class="dropdown-item" href="tickets.php">London Guided Tours</a>
								<a class="dropdown-item" href="attractions.php">London Attractions</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="">Cancel reservation</a>
							</div>
						</li>
						<?php
							//if the email is set when the user logged in then dispaly the log-out and profile buttons
							if(isset($_SESSION['userEmail'])){
								echo '<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
								aria-haspopup="true" aria-expanded="false">'.$_SESSION['userFirstName'] .'</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="bookings.php">Bookings <i class="fas fa-book"></i></a>
								<a class="dropdown-item" href="#">Settings <i class="fas fa-cog"></i></a>
									<div class="dropdown-divider "></div>
										<form class="padding-form-sing-out" action="includes\sign_out.php" method="POST">
											<li class="nav-item ">
												<button  class="btn btn-primary" type="submit" name="submit"><i class="fas fa-sign-out-alt"></i>Logout</button>
											</li>
										</form>	
									</div>
								</li>
								<form action="includes\sign_out.php" method="POST">
									<li class="nav-item">
										<button class="btn btn-logout btn-primary" type="submit" name="submit"><i class="fas fa-sign-out-alt"></i>Logout</button>
									</li>
								</form>';
							//if the user email global variable was not set then display login and sign-up buttons 
							} else {
								echo '<li class="nav-item">	
								<a class="nav-link" href="#" data-toggle="modal" data-target="#loginForm"><i class="fas fa-user" ></i>Log in</a>
								</li>
								<li class="nav-item">
									<a class=" regButton nav-link btn btn-primary" href="registration.php"><i class="fas fa-user-plus"></i>Sign up</a>
								</li>';
							}
						?>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Modal for log-in-->
		<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content ">
			<div class="modal-header ">
				<h5 class="modal-title " id="ModalLabel">Log in to GetYourGuide</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="padding-text modal-body">
				<p class="padding-text">Log in to add things to your wishlist and access your bookings from any device.</p>
			<div class="container-fluid">
			<div class="row text-center">
				<div class="col-12 social padding">
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-google-plus-g"></i></a>
				</div>
			</div>
			</div>
			<div class="container-fluid">
			<div class="row ">

				<!-- the form that will send the inputs to sing_in.pnp script via post method -->
			<form class="mx-auto" action="includes/sign_in.php" method="POST">
				<div class="form-group">
					<label for="InputEmail1">Email address</label>
					<input type="email" class="form-control" id="InputEmail1" name="_user_email_" aria-describedby="emailHelp" placeholder="Enter email" required>
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="InputPassword1">Password</label>
					<input type="password" class="form-control" id="InputPassword1" name="_user_password_" placeholder="Password" required>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="Check1">
					<label class="form-check-label" for="Check1">Remember me</label>
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>	
			</div>
			</div>	
			</div>
			<div class="modal-footer">
				<h5>New here? </h5><a href="registration.php">Create an account</a>
			</div>
			</div>
		</div>
		</div>


		<!-- Content of the modal, consists of a pop-up that is using js with a form of content 
		it is design to help users to get in touch faster-->
		<!-- Modal for chat -->
		<div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="chatLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="chatLabel">Chat with Us</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="formForMessages">
				<!-- the form with the three required fields -->
				<form  action="includes\support_req.php" method="POST" autocomplete="off">
					<div class="row">
					<div class="col">
							<select name="subject" class="form-control" placeholder="Subject">
								<option>Booking</option>
								<option>Payment</option>
								<option>Account</option>
								<option>Refound</option>
								<option>Cancellation</option>
								<option>Products</option>
								<option>Other</option>
							</select>
						<!-- <input type="text" size="100" max name="subject" class="form-control" placeholder="Subject"> -->
					</div>
					<div class="col">
						<input type="number" name="phoneNumber" class="form-control" placeholder="phone number">
					</div>
					</div>
					<div class="form-group">
					<label for="exampleFormControlTextarea1"><span class="mandarory">*</span></label>
					<textarea class="form-control" size="500" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Your message goes here..." require></textarea>
					</div>
					<div class="form-group row">
					<div class="col-xl-6 col-sm-6">
						<button type="submit" name="submit" class="btn btn-secondary btn-lg btn-block active">Send</button>
					</div>
					</div>
				</form>
				</div>
			</div>
			</div>
		</div>
		</div>

		<!-- Modal for cart -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="cartLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cartLabel">Shopping Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="items" class="modal-body">
				<?php
				
				if(!isset($_SESSION['cart'])){
					echo	'<h4 class="text-center">The cart is empty</h4>';
				}else{
				include 'includes/db_inc.php';
				echo '<div  class="container">
							<table class="table table-striped text-center">
								<thead>
									<tr>
										<th scope="col">Product</th>
										<th scope="col">Number</th>
										<th scope="col">Date</th>
										<th scope="col">Remove</th>
									</tr>
								</thead>
								<tbody>';

				if(!isset($_SESSION['cart'])|| empty($_SESSION['cart'])){
					$_SESSION['cart']=0;
				}else{							
							foreach($_SESSION['cart'] as $item){
								$query = "";				
								if($item >= '0' && $item <= '100'){
									$query = "SELECT * FROM `_tours_` WHERE _tours_._id_ = '$item';";
									}elseif($item >= '101' && $item <= '1000'){
										$query = "SELECT * FROM `_attractions_` WHERE _attractions_._id_ ='$item';";
									}elseif($item >= '1001' && $item <= '5000'){
										$query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ ='$item';";
									}elseif($item >= '5001' && $item <= '10000'){
										$query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ ='$item';";
									}
									$results = mysqli_query($connection, $query);
									//number of rows returned after the query executed 
									$queryResults = mysqli_num_rows($results);
									if($queryResults > 0){
										$row = mysqli_fetch_assoc($results);
											echo'<tr>
														<th scope="row">'.$row['_title_'].'</th>
														<td>
															<a class="delete-btn delete" href="includes\functions.php?id='.$row['_id_'].'&action=remove"><i class="fas fa-minus-square"></i></a>
															'.$_SESSION['number'].'
															<a class="delete-btn delete" href="includes\functions.php?id='.$row['_id_'].'&action=remove"><i class="fas fa-plus-square"></i></a>
														</td>
														<td><i class="fas fa-pound-sign"> </i> '.$row['_price_'].'</td>
														<td class="text-center">
															<button onclick="removeItem('.$row['_id_'].', 1)" class="delete-btn delete btn btn-primary" ><i class="fas fa-trash-alt "></i></button>
														</td>
													</tr>';
												}
									}	
							}
				echo '</tbody>
				</table>
		</div>';
	}
	

	
	
	
	?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue</button>
        <button type="button" onclick="location.href = 'check-out.php';" class="btn btn-primary">Check out</button>
      </div>
    </div>
  </div>
</div>



<?php 
    include 'includes/db_inc.php';
		if(isset($_GET['index'])){
		$msg = mysqli_real_escape_string($connection, $_GET['index']);
		if($msg == 1){
			echo "<script type='text/javascript'>alert('Your request was registred')</script>";
		}else{
			echo "<script type='text/javascript'>alert('Something went wrong, please try again!')</script>";
		}
	}	
?>
		</header>
		
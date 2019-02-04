<?php
//keep the session as long the user didn't press sing out
session_start();
?>
<!-- file type HTML -->
<!DOCTYPE html>
<!-- smantinc language of the file english -->
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
		<!-- navbar menu that will expand at the break point medium (md) devices (tablets, 768px and up)
		@media (min-width: 768px) { ... } the color of the navbar is light and will slick to the top of the page untill specified a break point where it will go away-->
		<nav class="navbar navbar-expand-md navbar-light fixed-top">
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
							<a class="nav-link active" href="index.php">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Shop
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Gifts</a>
								<a class="dropdown-item" href="#">Souvenirs</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="">Personalize</a>
							</div>
						</li>			
						<li class="nav-item">
							<a class="nav-link" href="#ticket-section"><i class="fas fa-ticket-alt"></i>Tickets</a>
						</li>
						<?php
							if(isset($_SESSION['userEmail'])){
								echo '<form action="includes\sign_out.php" method="POST">
								<button class="btn btn-primary" type="submit" name="submit">Logout</button>
							</form>';
								
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

		<!-- Modal -->
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


		
	</header>
		
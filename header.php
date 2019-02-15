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
		<div class="container">
		<nav id="navbarSearch" class="navbar navbar-light fixed-top">
			<a class="chat-with-us" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-comment"></i> Chat</a>
			<form class="form-inline" action="search-main.php" method="POST" autocomplete="off">
					 <div id="search-box-main" class="input-group">
						<div class="input-group-prepend">
						<button type="submit" name="btn-search-main"><div class="input-group-text"><i class="fa fa-search"></i></div></button>
						</div>
						<input name="search-main" type="search" class="form-control " id="inlineFormInputGroupSearch" placeholder="Search" >
					</div>
			</form>
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
								<a class="dropdown-item" href="#">London Guided Tours</a>
								<a class="dropdown-item" href="tickets.php">Reserve</a>
								<a class="dropdown-item" href="#">Check-in</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="">Cancel reservation</a>
							</div>
						</li>
						<?php
							if(isset($_SESSION['userEmail'])){
								echo '<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['userFirstName'] .'</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Settings  <i class="fas fa-sliders-h"></i></a>
									<a class="dropdown-item" href="#">Feedback <i class="fas fa-envelope-open"></i></a>
									<div class="dropdown-divider "></div>
										<form class="padding-form-sing-out" action="includes\sign_out.php" method="POST">
											<li class="nav-item ">
												<button  class=" btn-logout btn btn-primary" type="submit" name="submit"><i class="fas fa-sign-out-alt"></i>Logout</button>
											</li>
										</form>	
									</div>
								</li>
								<form action="includes\sign_out.php" method="POST">
									<li class="nav-item">
										<button class="btn btn-logout btn-primary" type="submit" name="submit"><i class="fas fa-sign-out-alt"></i>Logout</button>
									</li>
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


		<!-- Content of the modal, consists of a pop-up that is using js with a form of content 
		it is design to help users to get in touch faster-->
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chat with Us</h5>
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
						<input type="text" size="100" max name="subject" class="form-control" placeholder="Subject">
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


		</header>
		
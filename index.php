<?php
 include_once 'header.php';
?>
<?php
    include 'includes/db_inc.php';
?>
<style>
<?php include('css/style.css');?>

#active-home{
	color: #1a2b49;
	font-weight: bold;
}
</style>

<!--- Image Slider -->
<!-- a carousel bootstrap element that will make the site looking better by changing automatically the main image from the main page -->
<div id="slides" class="carousel slide" data-ride="carousel">
	<!-- carousel controller seen on the bottom of the page-->
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
	</ul>
	<!-- carousel image content -->
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/img_book-ticket.jfif" alt="main slide image Photo by Arkadiusz Radek on Unsplash">
			<!-- carousel caption
				 the content on the top of carousel  -->
			<div class="carousel-caption">
				<h3 class="display-2 hide-medium">Love where you're going</h3>
				<div class="booking-form">
					<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
						<div class="form-row">
							<div class="col-md-4 col-sm-6 ">
							<div class="input-group">
								<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-compass"></i></div>
								</div>
								<select name="tour" class="form-control">
									<?php
									$query = "SELECT _title_ FROM `_tours_`";
									$results = mysqli_query($connection, $query);
									//number of rows returned after the query executed 
									$queryResults = mysqli_num_rows($results);
									if($queryResults > 0){ 
										while($row = mysqli_fetch_assoc($results)){
											echo '<option name="tour">'.$row['_title_'].'</option>';
										}
									}else{
										echo '<option>No rote found</option>';
									}
									?>
								</select>
							</div>
							</div>
							<div class="col-md-3 col-sm-6">
							<div class="input-group">
							 <!-- Date input -->
							 <div class="input-group">
								<div class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
        						<input class="form-control" id="date" name="date" placeholder="Start day" type="text"/>
							</div>	
      						</div>
							</div>
							<div class="col-md-3 col-sm-6">
							<div class="input-group">
								<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-male"></i></div>
								</div>
								<input class="form-control" id="number" name="number" type="number" placeholder="tickets"/>
							</div>
							</div>
							<div class="col-md-2 col-sm-6">
								<button type="submit" name="submitBook" class="btn btn-outline-light btn-book">Book</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
if(isset($_POST['submitBook'])){

	$ticketOption = trim(mysqli_real_escape_string($connection, $_POST['tour']));
	$query = "SELECT _id_ FROM `_tours_` WHERE _title_ = '$ticketOption'";
									$results = mysqli_query($connection, $query);
									$ticketOption = mysqli_fetch_assoc($results);
	$optionTour = $ticketOption['_id_'];
	$reservationDate = trim(mysqli_real_escape_string($connection, $_POST['date']));
	$numberOfReservations = trim(mysqli_real_escape_string($connection, $_POST['number']));
	$user_id = $_SESSION['userID'];
	$sql = "INSERT INTO `_booked_guided_tours_`
	 (`_id_`, `_tour_id_`, `_user_id_`, `_date_`, `_number_of_tickets_`)VALUES 
	 (NULL, '$optionTour', '$user_id', '$reservationDate', '$numberOfReservations');	";
	mysqli_query($connection, $sql);
} else {

}

?>

<!--- Image Slider -->
<!-- a carousel bootstrap element that will make the site looking better by changing automatically the main image from the main page -->
<!-- <div id="slides" class="carousel slide" data-ride="carousel"> -->
	<!-- carousel controller seen on the bottom of the page-->
	<!-- <ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
	</ul> -->
	<!-- carousel image content -->
	<!-- <div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/background7.jpg" alt="main slide image Photo by Arkadiusz Radek on Unsplash">
		
			<div class="carousel-caption search-box-div">
				<h3 id="display-2" class="display-2">Love where you're going</h3>
				<div class="booking-form search-box">
					<form>
						<div class="form-row">
							<div class="col-md-9 col-sm-9 ">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
							</div>
							<div class="col-md-3 col-sm-3">
							<Button type="button" class="btn btn-outline-light btn-book">Search</Button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> -->


<div class="container-fluid" id="ticket-section">
	<div class="container essential-section-style">
		<h1 class="text-center">Find the route that suits you the most</h1>
		</div>

		<!-- Three Column Section -->
		<div class="container-fluid padding">
		<div class="row text-center padding">
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div>
					<img src="img/routA.png" alt="">
				</div>
				<h1 class="routA-style">Route A</h1>
				<p>Buy souvenirs for your family on our web site <a href=""> read more...</a></p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="padding-left">
					<img src="img/routB.png" alt="">
				</div>				
				<h1 class="routB-style">Route A and B</h1>
				<p>Buy souvenirs for your family on our web site <a href=""> read more...</a></p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<div>
					<img src="img/routA.png" alt="">
				</div>				
				<h1 class="routAandB-style">Route B</h1>
				<p>Buy souvenirs for your family on our web site <a href=""> read more...</a></p>
			</div>
		</div>
	</div>
</div>

<!-- follow img -->
<div class="text-center line-follow">
	<svg width="135" height="232" xmlns="http://www.w3.org/2000/svg"> <path d="M9.414 6.847c-10.242 61.891 6.022 99.937 48.794 114.136 64.157 21.298 77.75 56.573 67.694 113.764" stroke="#F53" stroke-width="12" fill="none" fill-rule="evenodd" stroke-dasharray="0,23" stroke-linecap="round"></path> </svg>
</div>



<!--- Flex Section -->
<div class="container-fluid text-center flexible-section-style padding ">
	<div class="container">
		<div class="row padding">
			<div class="col-md-12 col-lg-12">
				<h2>Keep things flexible</h2>
				<p>
					In case plans change, you can cancel most bookings for free up to 24 hours before they start. If you ever need us, customer service is available 24/7 in multiple languages.			
				</p>
			</div>
			<!-- <div class="col-lg-6">
				<img class="img-fluid" src="img/desk.png" alt="article image desck">
			</div> -->
		</div>
	</div>
</div>

<!--- Three Column Section -->
<div class="container essential-section-style">
	<h1 class="text-center">Find your <i class="special-color">London Tours</i> product</h1>
</div>

<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-xs-12 col-sm-6 col-md-4 decoration-none">
			<a href="">
				<i class="fab fa-cc-discover"></i>
				<h3>Tickets</h3>
			</a>
			<p>Buy tour tickets on our web site </p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 decoration-none">
			<a name="souvenirs" href="shop.php?id=gifts">
				<i class="fas fa-gift"></i>
				<h3>Gifts</h3>
			</a>
			<p>Buy gifts for your family on our web site</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 decoration-none">
			<a name="souvenirs" href="shop.php?id=souvenirs">
				<i class="fas fa-chess-pawn"></i>
				<h3>Souvenirs</h3>
			</a>
			<p>Buy souvenirs for your family on our web site</p>
		</div>
	</div>
</div>


<!--- Subscribe Section -->

<div class="container-fluid  text-center subscribe-section-style padding">
	<div class="container">
		<div class=" row padding">
			<div class="col-md-12 col-lg-12">
				<h2>We’ve got some tips for you</h2>
				<h4>Sign up for a weekly dose of travel inspiration</h4>
	
				<form class="form-inline form-subscribe">
					<input type="email" class="form-control" id="inputPassword2" placeholder="email">
					<button type="submit" class="btn btn-primary button-subscribe">Subscribe</button>
				</form>			
				<p>
					By signing up, you agree to receive promotional emails. You can unsubscribe at any time. For more information, read our <a href="#" target="_blank">privacy statement</a>
				</p>
			</div>
		</div>
	</div>
</div>

<!-- London attractions -->
<div class="text-center line-follow">
	<svg width="135" height="232" xmlns="http://www.w3.org/2000/svg"> <path d="M9.414 6.847c-10.242 61.891 6.022 99.937 48.794 114.136 64.157 21.298 77.75 56.573 67.694 113.764" stroke="#F53" stroke-width="12" fill="none" fill-rule="evenodd" stroke-dasharray="0,23" stroke-linecap="round"></path> </svg>
</div>

<div class="container text-center attraction-section">
	<h1>Top London attractions</h1>
	<!--- Cards -->
	<div class="container padding">
		<div class="row padding">
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="card">
					<img class="card-img-top" src="img/big-ben.jpg" alt="big ben image">
					<div class="card-body">
						<h4 class="card-title">The Famous Big Ben</h4>
					</div>
				</div>
			</div>
			<div class="hide hide-sm-screen col-lg-3 col-md-4 col-sm-6">
				<div class="card">
					<img class="card-img-top" src="img/towerBrige.jpg" alt="The Tower of London image">
					<div class="card-body">
						<h4 class="card-title"> The Tower Bridge</h4>
					</div>
				</div>
			</div>
			<div class="hide hide-sm-screen hide-md-screen col-lg-3 col-md-4 col-sm-6">
				<div class="card">
					<img class="card-img-top" src="img/B-palace-guards.jpg" alt="Buckingham Palace image">
					<div class="card-body">
						<h4 class="card-title">Buckingham Palace </h4>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="card">
					<img class="card-img-top" src="img/london_eye.jpg" alt="The London Eye image">
					<div class="card-body">
						<h4 class="card-title">The <span class="hide">Famous</span> London Eye</h4>
					</div>
				</div>
			</div>
		</div>

		<div class="row padding">
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="card">
					<img class="card-img-top" src="img/madame.jpg" alt="Madame Tussauds image">
					<div class="card-body">
						<h4 class="card-title">Madame Tussauds</h4>
					</div>
				</div>
			</div>
			<div class="hide hide-sm-screen hide-md-screen col-lg-3 col-md-4 col-sm-6">
				<div class="card">
					<img class="card-img-top" src="img/brithishMus.jpg" alt="British Museum image">
					<div class="card-body ">
						<h4 class="card-title">The British Museum</h4>
					</div>
				</div>
			</div>
			<div class="hide hide-sm-screen col-lg-3 col-md-4 col-sm-6">
				<div class="card">
					<img class="card-img-top" src="img/st-paul.jpg" alt="Cathedral of St. Paul image">
					<div class="card-body">
						<h4 class="card-title">Cathedral of St. Paul</h4>
					</div>
				</div>
			</div>
			<div class=" col-lg-3 col-md-4 col-sm-6">
				<div class="card">
					<img class="card-img-top" src="img/blog-easter-tower-image.jpg" alt="Tower of London image">
					<div class="card-body">
						<h4 class="card-title">The Tower of London</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
	include_once 'footer.php';
?>
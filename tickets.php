<?php
 include_once 'header.php';
?>
<?php
    include 'includes/db_inc.php';
?>
<style>
<?php include('css/style.css');?>

#active-ticket{
	color: #1a2b49;
	font-weight: bold;
}

</style>


<!--- Image Slider -->


<!-- a carousel bootstrap element that will make the site looking better by changing automatically the main image from the main page -->
<div id="slides" class="carousel slide londonGuidedTours" data-ride="carousel">
	<!-- carousel controller seen on the bottom of the page-->
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
	</ul>
	<!-- carousel image content -->
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img style="opacity: 0.9" src="img/background7.jpg" alt="main slide image Photo by Arkadiusz Radek on Unsplash">
			<div class="carousel-caption search-box-div">
				<h3 id="display-2" class="display-2">London Guided Tours</h3>
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
</div>

<div class="container-fluid" id="ticket-section">
	<div class="container essential-section-style">
		<h1 class="text-center">Find the route that suits you the most</h1>
		<h5 class="padding text-center">Our hop-on, hop-off London guided tours get you closer to London's best landmarks and attractions. Discover the city's rich 2000-year history over four carefully designed sightseeing routes, featuring over 45 different stops.</h5>
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
<div id="toursIntroduction" class=" text-center  line-follow">
	<svg width="135" height="232" xmlns="http://www.w3.org/2000/svg"> <path d="M9.414 6.847c-10.242 61.891 6.022 99.937 48.794 114.136 64.157 21.298 77.75 56.573 67.694 113.764" stroke="#F53" stroke-width="12" fill="none" fill-rule="evenodd" stroke-dasharray="0,23" stroke-linecap="round"></path> </svg>
</div>
<?php
 $query = "SELECT * FROM `_tours_`";
 $results = mysqli_query($connection, $query);
 //number of rows returned after the query executed 
 $queryResults = mysqli_num_rows($results);
 if($queryResults > 0){
	 
	 echo '<div class="container-fluid">
	 <span id="added" style="font-size:12px;"></span> 
	 <div class="card-deck mb-3 text-center">';
	while($row = mysqli_fetch_assoc($results)){
		echo '
		<div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">'.$row['_title_'].'</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><i class="fas fa-pound-sign"> </i>'.$row['_price_'].' <small class="text-muted"></small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>1-Day Hop-on, hop-off ticket</li>
          <li>Every 10-15 Minutes</li>
          <li>Live speaking guides</li>
          <li>Help center access</li>
				</ul>
				<div class="row">
					<div class="col-md-6 col-ms-12 col-xs-12">
					<a onclick="addItem('.$row['_id_'].')"  value="'.$row['_id_'].'"  id="addItem" name="'.$row['_id_'].'" class="btn btn-lg btn-block btn-primary"><i class="fas fa-cart-plus"></i> Add</a>

					</div>
					<div class="col-md-6 col-ms-12 col-xs-12">
					<a href="check-out.php?id='.$row['_id_'].'"  name="'.$row['_id_'].'" class="btn btn-lg btn-block btn-success"><i class="fas fa-credit-card"></i> Buy</a>
					</div>
				</div>			
			</div>
    </div>';
	}
	echo ' </div>
  </div>';
 }else{
		echo '<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
		<h1 class="display-4">Pricing</h1>
		<p class="lead">For priceing and other details please contact us and we will provide all the information.</p>
	</div>';
 }?>

<!-- follow img -->
<div class="text-center line-follow">
	<svg width="135" height="232" xmlns="http://www.w3.org/2000/svg"> <path d="M9.414 6.847c-10.242 61.891 6.022 99.937 48.794 114.136 64.157 21.298 77.75 56.573 67.694 113.764" stroke="#F53" stroke-width="12" fill="none" fill-rule="evenodd" stroke-dasharray="0,23" stroke-linecap="round"></path> </svg>
</div>
</div>
<?php
 $query = "SELECT * FROM `_tours_`";
 $results = mysqli_query($connection, $query);
 //number of rows returned after the query executed 
 $queryResults = mysqli_num_rows($results);

 if($queryResults > 0){
	 echo '
	 <div id="ticketsAndTours"  class="toursDescription padding container-margin-tickets">	
	 <div class="row padding">
	 <div class="text-center col-12">
		<h1>Our three London Guided Routes</h1>
		</div>
	 <div class="col-3 addBorder">
	 <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">';
	while($row = mysqli_fetch_assoc($results)){
		if($row['_id_'] == 1){
			echo ' <a class="nav-link active" id="v-pills-'.$row['_id_'].'-tab" data-toggle="pill" href="#v-pills-'.$row['_id_'].'" role="tab" aria-controls="v-pills-'.$row['_id_'].'" aria-selected="true">'.$row['_title_'].'</a>';
		}else{
			echo '
			<a class="nav-link" id="v-pills-'.$row['_id_'].'-tab" data-toggle="pill" href="#v-pills-'.$row['_id_'].'" role="tab" aria-controls="v-pills-'.$row['_id_'].'" aria-selected="true">'.$row['_title_'].'</a>';  
		}
		}
	echo 
		'</div>
	</div>';
	echo 
	'<div class="col-9">
	<div class="tab-content" id="v-pills-tabContent">';
	
	 $results = mysqli_query($connection, $query);
 	//number of rows returned after the query executed 
	 $queryResults = mysqli_num_rows($results);
	 $tourID = ''; 
		while($row = mysqli_fetch_assoc($results)){
			$tourID = $row['_id_'];
		if($row['_id_'] == 1){
			echo '
			<div class="tab-pane fade active show" id="v-pills-'.$row['_id_'].'" role="tabpanel" aria-labelledby="v-pills-'.$row['_id_'].'-tab">
			<ul class="nav nav-pills nav-fill">
				<li class="nav-item addBorder">
					Tour Duration: <strong>'.$row['_duration_'].'</strong>
				</li>
				<li class="nav-item addBorder">
					Frequency: <strong>'.$row['_frequency_'].'</strong>
				</li>
				<li class="nav-item">
					<a name="'.$row['_id_'].'" id="'.$row['_id_'].'" class="btn btn-success" href="buy_tickets.php?id='.$row['_id_'].'&product=tour"><strong>Price: <i class="fas fa-pound-sign"> </i>'.' '.$row['_price_'].' <i class="fas fa-shopping-cart"></i></strong></a>
				</li>
			</ul>
			<br>
			<div class="text-center">
			<h2 class="padding">Route map</h2>
			<img src="img/tour_maps/'.$row['_id_'].'.PNG"  class="rounded img-fluid img-thumbnail" alt="">
			</div>';
				
				$query2 = "SELECT * FROM _stops_ WHERE _stops_._route_id_ = $tourID";
				$results2 = mysqli_query($connection, $query2);
				//number of rows returned after the query executed 
				echo '<h2 class="padding-top text-center">Route Stations</h2>';
				while($row2 = mysqli_fetch_assoc($results2)){
				echo '
				<div class="station-carts">
					<div class="card">
						<div class="card-body ">
							<h6 class="card-text">Location:</h6>
							<h4 class="card-title">'.$row2['_name_'].'</h4>
						</div>
							<ul class="list-inline card-header">
							<li class="list-inline-item"><i class="far fa-compass"></i></li>
							<li class="list-inline-item"><i class="fab fa-fort-awesome-alt"></i></li>
							<li class="list-inline-item"><i class="fas fa-bus"></i></li>
							</ul>
						</div>
				</div>';}
			echo	'</div>';
		} else{
			echo '
			<div class="tab-pane fade show" id="v-pills-'.$row['_id_'].'" role="tabpanel" aria-labelledby="v-pills-'.$row['_id_'].'-tab">
			<ul class="nav nav-pills nav-fill">
				<li class="nav-item addBorder">
					Tour Duration: <strong>'.$row['_duration_'].'</strong>
				</li>
				<li class="nav-item addBorder">
					Frequency: <strong>'.$row['_frequency_'].'</strong>
				</li>
				<li class="nav-item">
					<a type="button" name="'.$row['_id_'].'" id="'.$row['_id_'].'" class="btn btn-primary" href="ticket.php?id='.$row['_id_'].'"><strong> Price: <i class="fas fa-pound-sign"> </i>'.' '.$row['_price_'].' <i class="fas fa-shopping-cart"></i></strong></a>
				</li>
			</ul>
			<br>
			<div class="text-center">
			<h2 class="padding">Route map</h2>
			<img src="img/tour_maps/'.$row['_id_'].'.PNG"  class="img-fluid img-thumbnail" alt="">
			</div>';
			$tourID = $row['_id_'];
				$query2 = "";
			if($tourID == 2){
				$query2 = "SELECT * FROM _stops_ WHERE _stops_._route_id_ = $tourID";
			}else{
				$query2 = "SELECT * FROM _stops_";
			}

		
			
			$results2 = mysqli_query($connection, $query2);
			//number of rows returned after the query executed 
			echo '<h2 class="padding-top text-center">Route Stations</h2>';
			while($row2 = mysqli_fetch_assoc($results2)){
			echo '
			<div class="station-carts">
				<div class="card">
					<div class="card-body ">
						<h6 class="card-text">Location:</h6>
						<h4 class="card-title">'.$row2['_name_'].'</h4>
					</div>
						<ul class="list-inline card-header">
						<li class="list-inline-item"><i class="far fa-compass"></i></li>
						<li class="list-inline-item"><i class="fab fa-fort-awesome-alt"></i></li>
						<li class="list-inline-item"><i class="fas fa-bus"></i></li>
						</ul>
					</div>
			</div>';}
			echo '</div>';
		}
	}
	echo '
	</div>
  </div>
</div>
</div>
	';

 }else {}
?>

<!-- hard coded tickets viewer -->

<!-- <div id="ticketsAndTours"  class="toursDescription text-center padding">
<div class="row text-center padding">
		<div class="col-12">
			<h1>Our three London Guided Routes</h1>
		</div>
  <div class="col-3 addBorder">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Route A</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Route B</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Route A & B</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
	  	<ul class="nav nav-pills nav-fill">
			<li class="nav-item addBorder">
				Tour Duration: <strong>2 hours, 40 minutes</strong>
			</li>
			<li class="nav-item addBorder">
				Frequency: <strong>Every 10-15 Minutes</strong>
			</li>
			<li class="nav-item">
				<a type="button" name="RoutA" id="ticketA" class="btn btn-primary" href="ticket.php?id=ticketA"><strong>TIMETABLE / BUY</strong></a>
			</li>
		</ul>
		<br>
		<img src="img/route_a_map.PNG"  class="img-fluid img-thumbnail" alt="">
	  </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
		<ul class="nav nav-pills nav-fill">
				<li class="nav-item addBorder">
					Tour Duration: <strong>2 hours, 30 minutes</strong>
				</li>
				<li class="nav-item addBorder">
					Frequency: <strong>Every 10-15 Minutes</strong>
				</li>
				<li class="nav-item">
				<a type="button" name="RoutA" id="ticketA" class="btn btn-primary" href="ticket.php?id=ticketA"><strong>TIMETABLE / BUY</strong></a>
				</li>
		  </ul>
		</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
		  <ul class="nav nav-pills nav-fill">
				<li class="nav-item addBorder">
					Tour Duration: <strong>2 hours, 30 minutes</strong>
				</li>
				<li class="nav-item addBorder">
					Frequency: <strong>Every 10-15 Minutes</strong>
				</li>
				<li class="nav-item">
					<strong>PRINT TIMETABLE / PRINT MAP</strong>
				</li>
		  </ul></div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>
  </div>
</div>
		</div>
</div> -->

<?php
 include_once 'footer.php';
?>
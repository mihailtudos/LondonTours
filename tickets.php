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
	 
	while($row = mysqli_fetch_assoc($results)){
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
					<a type="button" name="'.$row['_id_'].'" id="'.$row['_id_'].'" class="btn btn-primary" href="ticket.php?id='.$row['_id_'].'"><strong>TIMETABLE / BUY</strong></a>
				</li>
			</ul>
			<br>
			<img src="img/tour_maps/'.$row['_id_'].'.PNG"  class="img-fluid img-thumbnail" alt="">
			</div>';
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
					<a type="button" name="'.$row['_id_'].'" id="'.$row['_id_'].'" class="btn btn-primary" href="ticket.php?id='.$row['_id_'].'"><strong>TIMETABLE / BUY</strong></a>
				</li>
			</ul>
			<br>
			<img src="img/tour_maps/'.$row['_id_'].'.PNG"  class="img-fluid img-thumbnail" alt="">
			</div>';
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
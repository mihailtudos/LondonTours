<?php
 include_once 'header.php';
?>
<style>
<?php include('css/style.css');?>

#active-ticket{
	color: #1a2b49;
	font-weight: bold;
}
</style>

	<!-- Search field logic  -->
		
    <?php
        include 'includes/db_inc.php';
    ?>
    
    <div style="margin-top: 200px" class="container-fluid">
    <?php
        //using a get method as the id of the tour came thtough the link
        $toureID = mysqli_real_escape_string($connection, $_GET['id']);
        //SQL querry
        $query = "SELECT * FROM `_tours_` WHERE `_id_` = '$toureID'";
        //the results from database after running the query in db
        $results = mysqli_query($connection ,$query);
        //number of rows returned after the query executed 
        $queryResults = mysqli_num_rows($results);
    
        if($queryResults > 0){
            while($row = mysqli_fetch_assoc($results)){
                echo "<div>
                    <h3>".$row['_title_']."</h3>
                    <p>".$row['_region_']."</p>
                </div>";
            }
        }else{
            echo "nothing";
        }
    
    ?>
    
    
    </div>					
    



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
			<img style="opacity: 0.9" src="img/sightseeing-map.jpeg" alt="main slide image Photo by Arkadiusz Radek on Unsplash">
			<div class="carousel-caption search-box-div">
				<h3 id="display-2" class="display-2">London Routes & Tour Maps</h3>
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



<div id="ticketsAndTours"  class=" text-center padding">
<div class="row text-center padding">
		<div class="col-12">
			<h1>Our Routes</h1>
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
				Tour Duration: <strong>2 hours, 20 minutes</strong>
			</li>
			<li class="nav-item addBorder">
				Frequency: <strong>Every 10-15 Minutes</strong>
			</li>
			<li class="nav-item">
				<strong>PRINT TIMETABLE / PRINT MAP</strong>
			</li>
		</ul>
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
					<strong>PRINT TIMETABLE / PRINT MAP</strong>
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
</div>


<!--- Connect -->
<div class="container-fluid padding contact-us-section subscribe-section-style">
	<div class="row text-center padding">
		<div class="col-12">
			<h1>If you have any question contact us</h1>
		</div>
		<div class="col-12 social padding">
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-google-plus-g"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-youtube"></i></a>
		</div>
	</div>
</div>

<?php
 include_once 'footer.php';
?>
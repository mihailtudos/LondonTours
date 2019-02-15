<?php
    include 'header.php';
?>
<?php
    include 'includes/db_inc.php';
?>

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
				<h3 id="display-2" class="display-2">Take home a part of London</h3>
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

<!--- Three Column Section -->
<div class="subscribe-section-style">
<div class="container  essential-section-style">
	<h1 class="text-center">Find your <i class="special-color">London Tours</i> product</h1>
</div>
<div class="text-center line-follow">
	<svg width="135" height="232" xmlns="http://www.w3.org/2000/svg"> <path d="M9.414 6.847c-10.242 61.891 6.022 99.937 48.794 114.136 64.157 21.298 77.75 56.573 67.694 113.764" stroke="#F53" stroke-width="12" fill="none" fill-rule="evenodd" stroke-dasharray="0,23" stroke-linecap="round"></path> </svg>
</div>
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-xs-12 col-sm-6 col-md-4 decoration-none">
			<a href="tickets.php">
				<i class="fab fa-cc-discover"></i>
				<h3>Tickets</h3>
			</a>
        </div>
        <?php
        //using a get method as the id of the tour came thtough the link
        $keyPass = mysqli_real_escape_string($connection, $_GET['id']);

    if($keyPass == 'gifts'){
        echo '<div class="col-xs-12 col-sm-6 col-md-4 decoration-none">
        <a href="">
            <i class="fas fa-gift"></i>
            <h3>Gifts</h3>
        </a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 decoration-none">
        <a href="">
            <i class="fas fa-chess-pawn"></i>
            <h3>Souvenirs</h3>
        </a>
    </div>';
		
    }else{
        echo '<div class="col-xs-12 col-sm-6 col-md-4 decoration-none">
        <a href="">
            <i class="fas fa-chess-pawn "></i>
            <h3>Souvenirs </h3>
        </a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 decoration-none">
        <a href="">
            <i class="fas fa-gift"></i>
            <h3>Gifts</h3>
        </a>
    </div>';
    }
        ?>
	</div>
</div>
</div>
<div class="text-center line-follow">
	<svg width="135" height="232" xmlns="http://www.w3.org/2000/svg"> <path d="M9.414 6.847c-10.242 61.891 6.022 99.937 48.794 114.136 64.157 21.298 77.75 56.573 67.694 113.764" stroke="#F53" stroke-width="12" fill="none" fill-rule="evenodd" stroke-dasharray="0,23" stroke-linecap="round"></path> </svg>
</div>
<div style="margin-top: 25px" class="container-fluid">


<?php
        //using a get method as the id of the tour came thtough the link
        $keyPass = mysqli_real_escape_string($connection, $_GET['id']);

    if($keyPass == 'gifts'){
        //sanitize data that we get from the user
        //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT * FROM `_gifts_`";
        $results = mysqli_query($connection, $query);
        //number of rows returned after the query executed 
        $queryResults = mysqli_num_rows($results);

    if($queryResults > 0){
        echo '<div class="container">';
        echo '<div class="row container-fluid">';
        while($row = mysqli_fetch_assoc($results)){
            //echo a media elemet that displays searched ticket or toure and will send the id of the tour to the new page
          
                echo '<div  class="card text-white  mb-4 col-md-6" >
                <div class="row  no-gutters">
                  <div class="col-md-4 ">
                    <img src="img/gifts/'.$row['_id_'].'.jpg"  class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="text-white bg-secondary card-body">
                      <h5 class="card-title">'.$row['_title_'].'</h5>
                      
                      <p class="card-text">'.$row['_description_'].'</p>
                      <a href="#" class="btn btn-primary"><i class="fas fa-cart-arrow-down"></i></a>
                      <a href="#" class="btn btn-light disabled"><i class="fas fa-pound-sign"></i> <strong>'.$row['_price_'].'</strong></i></a>                    
                    </div>
                  </div>
                </div>
              </div>';
        }
        echo '</div>';
        echo '</div>';
    }else {
            echo '<!--- Image Slider -->
            <!-- a carousel bootstrap element that will make the site looking better by changing automatically the main image from the main page -->
            <div id="slides" class="carousel carousel-londing slide" data-ride="carousel">
                <!-- carousel controller seen on the bottom of the page-->
                <ul class="carousel-indicators">
                    <li data-target="#slides" data-slide-to="0" class="active"></li>
                </ul>
                <!-- carousel image content -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="img-fluid" src="img/FilthyGranularCoral-small.gif" alt="article image desck">
                    </div>
                </div>
            </div>';
        }
    }elseif($keyPass == 'souvenirs'){
        //sanitize data that we get from the user
        //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT * FROM `_souvenirs_`";
        $results = mysqli_query($connection, $query);
        //number of rows returned after the query executed 
        $queryResults = mysqli_num_rows($results);

    if($queryResults > 0){
        echo '<div class="container">';
        echo '<div class="row container-fluid">';
        while($row = mysqli_fetch_assoc($results)){
            //echo a media elemet that displays searched ticket or toure and will send the id of the tour to the new page
          
                echo '<div  class="card text-white  mb-4 col-md-6" >
                <div class="row  no-gutters">
                  <div class="col-md-4 ">
                    <img src="img/souvenirs/'.$row['_id_'].'.jpg"  class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="text-white bg-secondary card-body">
                      <h5 class="card-title">'.$row['_title_'].'</h5>
                      
                      <p class="card-text">'.$row['_description_'].'</p>
                      <a href="#" class="btn btn-primary"><i class="fas fa-cart-arrow-down"></i></a>
                      <a href="#" class="btn btn-light disabled"><i class="fas fa-pound-sign"></i> <strong>'.$row['_price_'].'</strong></i></a>                    
                    </div>
                  </div>
                </div>
              </div>';
        }
        echo '</div>';
        echo '</div>';
    }else {
            echo '<!--- Image Slider -->
            <!-- a carousel bootstrap element that will make the site looking better by changing automatically the main image from the main page -->
            <div id="slides" class="carousel carousel-londing slide" data-ride="carousel">
                <!-- carousel controller seen on the bottom of the page-->
                <ul class="carousel-indicators">
                    <li data-target="#slides" data-slide-to="0" class="active"></li>
                </ul>
                <!-- carousel image content -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="img-fluid" src="img/FilthyGranularCoral-small.gif" alt="article image desck">
                    </div>
                </div>
            </div>';
        }
    }
?>
 </div>
<?php
	include_once 'footer.php';
?>
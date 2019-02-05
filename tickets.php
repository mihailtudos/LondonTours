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
<?php
 include_once 'chat_button.php';
?>
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
					<form>
						<div class="form-row">
							<div class="col-md-4 col-sm-6 ">
								<select class="form-control " id="exampleFormControlSelect1">
									<option>Select...</option>
									<option>Rout A</option>
									<option>Rout B</option>
									<option>Rout A + B</option>
								</select>
							</div>
							<div class="col-md-3 col-sm-6">
							<input type="date" class="form-control">
							</div>
							<div class="col-md-3 col-sm-6">
							<input type="date" class="form-control" placeholder="Zip">
							</div>
							<div class="col-md-2 col-sm-6">
							<Button type="button" class="btn btn-outline-light btn-book">Book</Button>
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
		<h1 class="text-center">Find the rout that suits you the most</h1>
		</div>

		<!--- Three Column Section -->
		<div class="container-fluid padding">
		<div class="row text-center padding">
			<div class="col-xs-12 col-sm-6 col-md-4">
				<i class="fab fa-cc-discover"></i>
				<h3>Rout A</h3>
				<p>Buy souvenirs for your family on our web site <a href=""> read more...</a></p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<i class="fas fa-gift"></i>
				<h3>Rout B</h3>
				<p>Buy souvenirs for your family on our web site <a href=""> read more...</a></p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<i class="fas fa-chess-pawn"></i>
				<h3>Rout A and B</h3>
				<p>Buy souvenirs for your family on our web site <a href=""> read more...</a></p>
			</div>
		</div>
	</div>
</div>

<?php
 include_once 'footer.php';
?>
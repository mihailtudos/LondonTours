<?php
 include_once 'header.php';
?>

<style>
<?php include('css/style.css');?>
</style>

<!--- Image Slider -->
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
</div>

<!--- Subscribe Section -->

<div class="container-fluid  text-center subscribe-section-style padding">
	<div class="container">
		<div class=" row padding">
			<div class="col-md-12 col-lg-12">
				<h2>This page is not available yet</h2>
				<h4>Sign belov and we will notify you when the page is available, thanks.</h4>
	
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


<?php
	include_once 'footer.php';
?>
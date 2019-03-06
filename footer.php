<!--- Connect -->
<div class="container-fluid padding contact-us-section">
	<div class="row text-center padding">
		<div class="col-12">
			<h1>Connect Us</h1>
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

<!--- Footer -->
<footer class="footer-web">
	<div class="container-fluid padding ">
		<div class="row mx-auto">
			<div class="col-md-3 col-sm-6">
				<h5 class="">Mobile apps</h5>
				<div class="row">
					<div class="badgeApp col-lg-8 col-md-12 col-sm-8 col-xs-4">
						<a href="">
							<img class="appbadge" src="https://cdn.getyourguide.com/static/current/customer/desktop/cached/badges/google-play-badge-en.svg" alt="android bage app store">
						</a>
					</div>
					<div class="badgeApp col-lg-8 col-md-12 col-sm-8 col-xs-4">
						<a href="">
							<img class="appbadge" src="https://cdn.getyourguide.com/static/current/customer/desktop/cached/badges/app-store-badge-en.svg" alt="apple bage app store">
						</a>
					</div>
				</div>	
			</div>
			<div class="col-md-3 col-sm-6">
				<h5>Support</h5>
				<p><a href="contact_us.php">Contact</a></p>
				<p><a href="londing_page.php">Privacy</a></p>
				<p><a href="londing_page.php">Legal</a></p>
				<p><a href="londing_page.php">Policy</a></p>
				<p><a href="londing_page.php">Terms and Conditions</a></p>
			</div>
			<div class="col-md-3 col-sm-6">
				<h5>Company</h5>
				<p><a href="contact_us.php">About us</a></p>
				<p><a href="londing_page.php">Careers</a></p>
				<p><a href="londing_page.php">Blog</a></p>
				<p><a href="">Gift</a></p>
				<p><a href="">Souvenir</a></p>
			</div>
			<div class="col-md-3 col-sm-6">
				<h5>Work With Us</h5>
				<p><a href="londing_page.php">Supplier </a></p>
				<p><a href="admin/sign-in.php">Admin</a></p>
				<p><a href="londing_page.php">Affiliate Partner </a></p>
				<p><a href="londing_page.php">Ways you can pay</a></p>
				<p><a href="contact_us.php">Contact us</a></p>
			</div>
			<div class="col-12">
				<h5>Copyright &copy; LondonTours.co.uk 2019</h5>
			</div>
		</div>
	</div>
</footer>



</body>
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



<script>
				

				function removeItem(id, action) {
					var item = 'id='+id;
					var func = 'action='+action;
					var data = item + func ;
					jQuery.ajax({
					url: "includes/functions.php",
					data : 'id='+ encodeURIComponent(id) + '&action='+ encodeURIComponent(action),
					type:"GET",
					success:function(data){
					$("#removed").html(data);
					},
					error:function (){}
					});
			}




			function addItem(id) {
				jQuery.ajax({
				url: "includes/buy_tickets.php",
				data:'itmeID='+id, 
				type: "post",
				success:function(data){
				$("#added").html(data);
				},
				error:function (){}
				});
			}



    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
	})
	
	setInterval(function() {
    $("#refresh").load(location.href+" #refresh>*","");
    $("#items").load(location.href+" #items>*","");
}, 1000); // seconds to wait, miliseconds
</script>
<!-- BODY END -->
</html>
<?php 
session_start();


if(!isset($_SESSION['userPrivilege']) ||  $_SESSION['userPrivilege'] == 0){
    die(header("location: ../home.php"));
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard · London Tours</title>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
	<!-- jQuery latest version CDN connection -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- popper js latest version CDN connection -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- bootstrap minified latest version CDN connection -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- fontawesome (icons) latest version CDN connection -->
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!-- local CSS file -->

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure you want to delete this booking?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      
      @media (min-width: 768px) {
        .hide{
            display: none;
          }
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <link href="css\style.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">London Tours</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <form class="padding-form-sing-out" action="..\includes\sign_out.php" method="POST">
	    <li class="nav-item ">
	        <button  class=" btn-logout btn btn-primary" type="submit" name="admin-sign-out"><i class="fas fa-sign-out-alt"></i>Logout</button>
	    </li>
	</form>	 
  </ul>
  <button class="navbar-toggler hide" type="button" data-toggle="collapse" data-target="#navbarResponsive">
					<!-- create icon of the collapsed menu tipicaly 3 lines as we use to see on devices -->
					<span class="navbar-toggler-icon"></span>
                </button>
                
				<div class="collapse navbar-collapse" id="navbarResponsive">
                    <div class="hide">
                    <nav class=" bg-light ">
      <div class="">
      <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active-home active-dashboard" href="index.php">
              <span data-feather="home"></span>
              Dashboard </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-bookings" href="bookings.php">
              <span data-feather="book-open"></span>
              Bookings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-create" href="createBooking.php">
              <span data-feather="clipboard"></span>
              Create Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-edit" href="editBookings.php">
              <span data-feather="edit-3"></span>
              Edit Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-delete" href="deleteBookings.php">
              <span data-feather="trash-2"></span>
              Delete Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
         
        </ul>

      </div>
    </nav>
                    </div>
                </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <nav class="col-md-2 d-none d-md-inline-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active-home active-dashboard" href="index.php">
              <span data-feather="home"></span>
              Dashboard </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-bookings" href="bookings.php">
              <span data-feather="book-open"></span>
              Bookings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-create" href="createBooking.php">
              <span data-feather="clipboard"></span>
              Create Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-edit" href="editBookings.php">
              <span data-feather="edit-3"></span>
              Edit Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-delete" href="deleteBookings.php">
              <span data-feather="trash-2"></span>
              Delete Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
         
        </ul>
      </div>
    </nav>

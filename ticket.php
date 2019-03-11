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

    <link href="js/form-validation.css" rel="stylesheet">
  <body>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <?php 
      $id = '';
      if(isset($_GET['id'])){
        $_SESSION['attID'] = $_GET['id'];
      $id = $_SESSION['attID'];
      $query = "SELECT * FROM `_attractions_` WHERE _id_ = '$id'";
      $results = mysqli_query($connection, $query);
      //number of rows returned after the query executed 
      $queryResults = mysqli_num_rows($results);
          if($queryResults > 0){
            $row = mysqli_fetch_assoc($results);
              echo'
              <div class="carousel-item active">
              <img id="carousel-img" class="bd-placeholder-img" width="100%" height="100%" src="img/attractions/large/'.$row['_id_'].'.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <div class="container">
                  <div class="carousel-caption">
                    <div id="specialTreatment">
                      <h1>'.$row['_title_'].'</h1>
                      <p>'.$row['_subtitle_'].'</p>
                      <p><a class="btn btn-lg btn-primary learn-more-btn" href="#'.$row['_id_'].'" role="button">Learn more</a></p>
                    </div>
                  </div>
                </div>
              </div>';
            }else{
              echo '<div class="carousel-item active">
            <img id="carousel-img" class="bd-placeholder-img" width="100%" height="100%" src="img/attractions/large/default.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Discover London</h1>
                </div>
              </div>
            </div>';
            }
        }else{
            echo '<div class="carousel-item active">
            <img id="carousel-img" class="bd-placeholder-img" width="100%" height="100%" src="img/attractions/large/default.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Discover London</h1>
                </div>
              </div>
            </div>';
        }
      ?>
      
    </div>
  </div>
    <div class="container margin-top-ticket">
      <?php 
      if(isset($_SESSION['added'])){         
        if($_SESSION['added']){
          echo "<span  style='color: green; font-size: 20px; margin: 0 0 20px 7px;'>Item successfully added into the cart.</span>     
              <a href='cart.php' type='button' data-toggle='modal' data-target='#cart'>view cart</a>";
              session_destroy();
              unset($_SESSION['added']);
        }else{
              echo "<span style='color:red; font-size: 20px; margin: 0 0 20px 7px;'> Something went wrong please try again</span>";
              session_destroy();
              unset($_SESSION['added']);
        }
      } 
      ?>
      <div class="row">
        <div id="test" class="col-md-4 order-md-2 mb-4 ">
          <div  class="jumbotron ">
            <h4 class="d-flex justify-content-between align-items-center mb-3 ">
              <span class="text-muted">Buy your ticket</span>
            </h4>
                <?php 
                // display a message if the booking was successful
                if(isset($_SESSION['booked'])){
                echo'<h2 class="success-msg">'.$_SESSION['booked'].'</h2>';
                $_SESSION['booked'] = "";
                unset($_SESSION['booked']);
              }
              ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <?php
                if(isset($_GET['id'])){
                  $query = "";
                    if($id >= '0' && $id <= '100'){
                    $query = "SELECT * FROM `_tours_` WHERE _tours_._id_ = '$id';";
                    }elseif($id >= '101' && $id <= '1000'){
                      $query = "SELECT * FROM `_attractions_` WHERE _attractions_._id_ = '$id';";
                    }elseif($id >= '1001' && $id <= '5000'){
                      $query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ ='$id';";
                    }elseif($id >= '5001' && $id <= '10000'){
                      $query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ ='$id';";
                    }
                  $results = mysqli_query($connection, $query);
                  //number of rows returned after the query executed 
                  $queryResults = mysqli_num_rows($results);
                  if($queryResults > 0){
                    $row = mysqli_fetch_assoc($results);
                    $firstName = $secondName = $email = $phone =$street = $postcode = $city = '';
                    if(isset($_SESSION['userFirstName']) && isset($_SESSION['userLastName']) && isset($_SESSION['userLastName'])){
                      $firstName    = mysqli_real_escape_string($connection,trim($_SESSION['userFirstName']));
                      $secondName   = mysqli_real_escape_string($connection,trim($_SESSION['userLastName']));
                      $email        = mysqli_real_escape_string($connection,trim($_SESSION['userEmail']));
                      $phone        = mysqli_real_escape_string($connection,trim($_SESSION['userPhone']));
                      $street       = mysqli_real_escape_string($connection,trim($_SESSION['userStreet']));
                      $postcode     = mysqli_real_escape_string($connection,trim($_SESSION['userPostcode']));
                      $city         = mysqli_real_escape_string($connection,trim($_SESSION['userCity']));
                    }
                    echo'<form class="needs-validation" novalidate action="includes/insert.php" method="POST" autocomplete="off" >
                          <div class="form-row">
                            <div>
                              <label for="date">Date</label>
                              <input  id="date" name="date"  type="text" class="form-control col-auto margin-inputs" id="validationCustom02" placeholder="date" required/>
                              <div class="invalid-feedback">
                                Date required.
                              </div>
                              <div class="margin-inputs">
                              <label class="margin-inputs" for="number">Number of tickets</label>
                              <input type="number" name="number" class="form-control col-auto margin-inputs" id="number" 
                              placeholder="number" value="number" min="1" required>
                              <input id="hide" type="number" name="id" value="'.$row['_id_'].'" hidden >
                              <input  type="hidden" name="firstName" value="'.$firstName.'" >
                              <input type="hidden" name="secondName" value="'.$secondName.'" >
                              <input type="hidden" name="email" value="'.$email.'" >
                              <input type="hidden" name="phoneNumber" value="'.$phone.'" >
                              <input type="hidden" name="street" value="'.$street.'" >
                              <input type="hidden" name="postcode" value="'.$postcode.'" >
                              <input type="hidden" name="city" value="'.$city.'" >
                              <input type="hidden" name="tour" value="'.$row['_title_'].'" >
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                            </div>
                            </div> 
                            <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                              <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                              </label>
                              <div class="invalid-feedback">
                                You must agree before submitting.
                              </div>
                            </div>
                          </div>';
                          if(isset($_SESSION['userPrivilege'])){
                            echo '<button href="includes/insert.php" type"submit" name="buyNow" class="btn btn-lg btn-block btn-success">
                                  <i class="fas fa-credit-card"></i> Buy</button>
                                  <a onclick="addItem('.$row['_id_'].')"  value="'.$row['_id_'].'"  id="addItem" name="'.$row['_id_'].'" class="btn btn-lg btn-block btn-primary">
                                  <i class="fas fa-cart-plus"></i> Add</a>
                                  </form>';
                          } else{
                            echo ' <a href="#" data-toggle="modal" data-target="#loginForm"> log in in order to buy</a>';
                          }
                  }
                  else{
                    echo'<h1>no available tickets</h1>';
                  }
                }else{
                  echo'<h1>no available tickets</h1>';
                }
            ?>
        </li>
    </div>
  </div>

    <!-- START THE FEATURETTES -->
    <div class="jumbotron col-md-8 order-md-1">
        <?php
          $query = "";
          if(isset($_GET['id'])){
            if($id >= '0' && $id <= '100'){
            $query = "SELECT * FROM `_tours_` WHERE _tours_._id_ = '$id';";
            }elseif($id >= '101' && $id <= '1000'){
              $query = "SELECT * FROM `_attractions_` WHERE _attractions_._id_ = '$id';";
            }elseif($id >= '1001' && $id <= '5000'){
              $query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ ='$id';";
            }elseif($id >= '5001' && $id <= '10000'){
              $query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ ='$id';";
            }
          $results = mysqli_query($connection, $query);
          //number of rows returned after the query executed 
          $queryResults = mysqli_num_rows($results);
          if($queryResults > 0){
            $row = mysqli_fetch_assoc($results);
              echo'
                  <div class="row featurette featurette-attraction">
                    <div class="col-md-7">
                      <h2 class="featurette-heading">'.$row['_title_'].'</h2>
                      <p class="lead">'.$row['_description_'].'</p>
                    </div>
                    <div class="col-md-5">
                      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded-circle" width="500" height="500" src="img/attractions/med/'.$row['_id_'].'.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
                    </div>
                  </div>
                  <hr class="featurette-divider">';
                }else{

                }
              }else{
                      echo'<h2>No more tickets available for this attraction</h2>
                      <div class="container-fluid  text-center subscribe-section-style padding">
                      <div class="container">
                        <div class=" row padding">
                          <div class="col-md-12 col-lg-12">
                            <h4>Sign up for a weekly dose of travel inspiration</h4>
                      
                            <form class="form-inline form-subscribe">
                              <input type="email" class="form-control" id="inputPassword2" placeholder="email">
                              <button disabled type="submit" class="btn btn-primary button-subscribe">Subscribe</button>
                            </form>			
                            <h6>
                              By signing up, you agree to receive promotional emails. You can unsubscribe at any time. For more information, read our <a href="#" target="_blank">privacy statement</a>
                            </h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <button onclick="history.go(-1);" type="button" class="btn btn-primary btn-lg btn-block">Back </button>
                    ';}
            ?>
      <!-- END THE FEATURETTES -->
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="js/form-validation.js"></script></body>
<?php 
  include 'footer.php';
?>
        </html>



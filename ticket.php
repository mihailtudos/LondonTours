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
      ?>
      
    </div>
  </div>
    <div class="container ">
      <div class="row ">
        <div id="test" class="col-md-4 order-md-2 mb-4 ">
          <div  class="jumbotron ">
            <h4 class="d-flex justify-content-between align-items-center mb-3 ">
              <span class="text-muted">Buy your ticket</span>
            </h4>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            
              <form class="needs-validation" novalidate>
              <div class="form-row">
                <div>
                  <label for="validationCustom01">Number of tickets</label>
                  <input type="number" class="form-control col-auto" id="validationCustom01" placeholder="number" value="number" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div>
                  <label for="zip">Date</label>
                  <input type="date" class="form-control col-auto" id="zip" placeholder="" data-date-format="DD MMMM YYYY" value="2015-08-09"required>
                  <div class="invalid-feedback">
                    Date required.
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
              </div>
              <button class="btn btn-success" type="submit">Buy </button>
              <button class="btn btn-primary" type="submit">Add</button>
            </form>
        </li>
        
    </div>
  </div>

    <!-- START THE FEATURETTES -->
    <div class="jumbotron col-md-8 order-md-1">
        <?php 
          $query = "SELECT * FROM `_attractions_` WHERE _id_ = '$id'";
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
                      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded-circle" width="500" height="500" src="img/attractions/med/101.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
                    </div>
                  </div>
                  <hr class="featurette-divider">';}
                  else{
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



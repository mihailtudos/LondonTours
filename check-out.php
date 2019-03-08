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
    <div class="container checkout-container">
  <div class="py-5 text-center">
    <h2>Checkout form</h2>
    <p class="lead">Please, ensure that you have selected correct items before pursuing to the payment. The payment details are not required as the check-out page is under testing now and is not connected to a payment API.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">
        <?php
        if(isset($_GET['id'])){
          echo '1';
        }else{
          if(!isset(($_SESSION['cart']))){
            echo '0';
          }elseif (empty($_SESSION['cart'])){
            echo '0';
          }
          else{
            echo sizeof($_SESSION['cart']);
          }
        }
        ?>
        </span>
      </h4>
      <ul class="list-group mb-3">



      <?php
        $total = 0;
				if(!isset($_SESSION['cart']) && !isset($_GET['id'])){
					echo	'<h4 class="text-center">The cart is empty</h4>';
				}else{
        include 'includes/db_inc.php';
        if(isset($_GET['id'])){
                  $query = "";
                  $item = 	$_GET['id'];
                  if($item >= '0' && $item <= '100'){
                    $query = "SELECT * FROM `_tours_` WHERE _tours_._id_ = '$item';";
                    }elseif($item >= '101' && $item <= '1000'){
                      $query = "SELECT * FROM `_attractions_` WHERE _attractions_._id_ = '$item';";
                    }elseif($item >= '1001' && $item <= '5000'){
                      $query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ ='$item';";
                    }elseif($item >= '5001' && $item <= '10000'){
                      $query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ ='$item';";
                    }
                    $results = mysqli_query($connection, $query);
                    //number of rows returned after the query executed 
                    $queryResults = mysqli_num_rows($results);
                    if($queryResults > 0){
                      $row = mysqli_fetch_assoc($results);
                      $total += 	$row['_price_'];		
                        echo'
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <h6 class="my-0">'.$row['_title_'].'</h6>
                          <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted"><i class="fas fa-pound-sign"></i> '.$row['_price_'].'</span>
                      </li>';
                          }
          }else{if(!isset($_SESSION['cart'])|| empty($_SESSION['cart'])){
            $_SESSION['cart']=0;
            }else{
                foreach($_SESSION['cart'] as $item){
                  $query = "";
                  $total += 	$row['_price_'];			
                  if($item >= '0' && $item <= '100'){
                    $query = "SELECT * FROM `_tours_` WHERE _tours_._id_ = '$item';";
                    }elseif($item >= '101' && $item <= '1000'){
                      $query = "SELECT * FROM `_attractions_` WHERE _attractions_._id_ ='$item';";
                    }elseif($item >= '1001' && $item <= '5000'){
                      $query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ = '$item';";
                    }elseif($item >= '5001' && $item <= '10000'){
                      $query = "SELECT * FROM `_souvenirs_` WHERE _souvenirs_._id_ = '$item';";
                    }
                    $results = mysqli_query($connection, $query);
                    //number of rows returned after the query executed 
                    $queryResults = mysqli_num_rows($results);
                    if($queryResults > 0){
                      $row = mysqli_fetch_assoc($results);
                        echo'
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <h6 class="my-0">'.$row['_title_'].'</h6>
                          <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted"><i class="fas fa-pound-sign"></i> '.$row['_price_'].'</span>
                      </li>';
                          }
                    }	
                }
              }
				
	        }echo ' <li class="list-group-item d-flex justify-content-between">
                <span>Total (GBP)</span>
                <strong><i class="fas fa-pound-sign"></i> '.$total.'</strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <button type="submit" class="btn btn-secondary ">Apply</button>
              </li>
            </ul>';
            ?>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form action="includes/insert.php" method="POST" class="needs-validation" autocomplete="off" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="firstName"   placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="secondName" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
          <label for="email">Email </label>
          <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
          <div class="invalid-feedback">
            Please enter a valid email address for further updates.
          </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="state">Phone number</label>
            <input type="number" name="phoneNumber" class="form-control" id="number" placeholder="0748452145" required>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
        </div>
       
        <div class="row">
          <input name="tour" class="form-control" value="3" hidden>
          <div class="col-md-6 mb-3">
            <label for="address">Address</label>
            <input name="street" type="text"  class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="city">City</label>
            <input name="city" type="text" class="form-control" id="city" placeholder="" required>
            <div class="invalid-feedback">
              City code required.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="postcode">Post Code</label>
            <input type="text" name="postcode" class="form-control" id="postcode" placeholder="" required>
            <div class="invalid-feedback">
              Post Code code required.
            </div>
          </div> 
        </div>
          
        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="date">Date</label>
            <input name="date" type="text" class="form-control" id="date" placeholder="YYYY-MM-DD" required>
            <div class="invalid-feedback">
              Please enter a valid date.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="number">Number of tickets</label>
            <input type="number" name="number" class="form-control" id="number" placeholder="" required min="1">
            <div class="invalid-feedback">
              City code required.
            </div>
          </div>
        </div>
        
        <hr class="mb-4">
        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" >
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" >
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" >
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" >
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <input type="number" value="<?php echo$_GET['id']?>" name="tour" hidden>
        <button class="btn btn-primary btn-lg btn-block" name="buyNow" type="submit">Pay Now</button>
      </form>
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



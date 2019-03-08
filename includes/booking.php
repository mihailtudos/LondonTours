


        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Mark" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" name="secondName" class="form-control" id="lastName" placeholder="Goodman" required>
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
          <div class="col-md-5 mb-3">
          <label for="validationCustom03">Choose Route</label>
        <select name="tour" class="form-control">
          <option  selected disabled hidden>Choose here</option>
									<?php
                  include 'db_inc.php';
                  echo ' here';
									$query = "SELECT _title_ FROM `_tours_`";
									$results = mysqli_query($connection, $query);
									//number of rows returned after the query executed 
									$queryResults = mysqli_num_rows($results);
									if($queryResults > 0){ 
										while($row = mysqli_fetch_assoc($results)){
											echo '<option name="tour">'.$row['_title_'].'</option>';
										}
									}else{
										echo '<option>No rote found</option>';
									}
									?>
								</select>
            <div class="invalid-feedback">
              Please select a valid route.
            </div>
          </div>


          <div class="col-md-4 mb-3">
          <div class="bootstrap-iso">
            <label for="validationCustom04">Date</label>
            <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text" required/>
            <div class="invalid-feedback">
              Please provide a valid date.
            </div>
          </div>
          </div>


          <div class="col-md-3 mb-3">
            <label for="number">No. of tickets</label>
            <input type="number" name="number"  class="form-control" id="#" placeholder="" required>
            <div class="invalid-feedback">
              A valid number is required.
            </div>
          </div>
        </div>


        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" name="street" class="form-control" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>


        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">City</label>
            <input type="text" name="city" class="form-control" id="city" name="city" placeholder="London" required>
            <div class="invalid-feedback">
              Please enter a valid city.
            </div>
          </div>
          
          <div class="col-md-3 mb-3">
            <label for="postcode">Post Code</label>
            <input type="text" name="postcode" class="form-control" id="postcode" placeholder="EC1R 4TF" required>
            <div class="invalid-feedback">
              Post code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        

        <h4 class="mb-3">Payment</h4>
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input">
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input">
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
        <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Continue to checkout</button>
      </form>
  </div>





<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

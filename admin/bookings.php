<?php 
  include 'navigation.php';
?>

<style>
.active-bookings  {
  color: blue;
  font-weight: bold;
  font-size: 20px;
  background: skyblue;
}
</style>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bookings</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <div class="container-fluid">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active submenu-font" id="pills-view-tab" data-toggle="pill" href="#pills-view" role="tab" aria-controls="pills-view" aria-selected="true">View customer bookings <i class="fas fa-eye"></i> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link submenu-font" id="pills-create-tab" data-toggle="pill" href="#pills-create" role="tab" aria-controls="pills-create" aria-selected="true">Create booking <i class="fas fa-plus-circle"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link submenu-font" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="false">Edit booking <i class="fas fa-pencil-alt"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link submenu-font" id="pills-delete-tab" data-toggle="pill" href="#pills-delete" role="tab" aria-controls="pills-delete" aria-selected="false">Delete booking <i class="fas fa-trash"></i></a>
        </li>
      </ul>
      <hr>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-view" role="tabpanel" aria-labelledby="pills-view-tab">
  <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
          <thead>
            <tr>
              <th>User id</th>
              <th>User name</th>
              <th>User email</th>
              <th>User phone</th>
              <th>User address</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          
            include '../includes/db_inc.php';

          //sanitize data that we get from the user
        //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT b._id_ , CONCAT(u._user_first_name_, ' ', u._user_last_name_ ) as 'user name', u._user_email_ , u._user_phone_no_ , t._title_ FROM _booked_guided_tours_ b INNER JOIN _users_ u on b._user_id_ = u._user_id_ INNER JOIN _tours_ t on b._tour_id_ = t._id_ ";
        $results = mysqli_query($connection, $query);
        //number of rows returned after the query executed 
        $queryResults = mysqli_num_rows($results);

        if($queryResults > 0){ 
        while($row = mysqli_fetch_assoc($results)){
          echo '<tr>
            <td>'.$row['_id_'].'</td>
            <td>'.$row['user name'].'</td>
            <td>'.$row['_user_email_'].'</td>
            <td>'.$row['_user_phone_no_'].'</td>
            <td>'.$row['_title_'].'</td>
            </tr>';
          }
        } else {
          echo '<h4>no registred users found</h4>';

        }
          ?>
            
          </tbody>
        </table>
      </div>
  </div>
  <div class="tab-pane fade show" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab">
    <form class="needs-validation" novalidate>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationCustom01">First name</label>
        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationCustom02">Last name</label>
        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationCustomUsername">Email</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
          </div>
          <input type="email" class="form-control" id="validationCustomUsername" placeholder="email@example.com" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Please a valid email.
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationCustom03">Chosen Route</label>
        <select name="tour" class="form-control">
          <option value="" selected disabled hidden>Choose here</option>
									<?php
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
          Please provide a valid route.
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationCustom04">Date</label>
        <input type="date" class="form-control" id="validationCustom04" placeholder="State" required>
        <div class="invalid-feedback">
          Please provide a valid date.
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationCustom05">Zip</label>
        <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
        <div class="invalid-feedback">
          Please provide a valid zip.
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
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
  </form>

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

  </div>
  <div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab"><h2>Registred users</h2>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>User id</th>
              <th>User name</th>
              <th>User email</th>
              <th>User phone</th>
              <th>User address</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          
            include '../includes/db_inc.php';

          //sanitize data that we get from the user
        //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT * FROM `_users_`";
        $results = mysqli_query($connection, $query);
        //number of rows returned after the query executed 
        $queryResults = mysqli_num_rows($results);

        if($queryResults > 0){ 
        while($row = mysqli_fetch_assoc($results)){
          echo '<tr>
            <td>'.$row['_user_id_'].'</td>
            <td>'.$row['_user_first_name_'].' '.$row['_user_last_name_'].'</td>
            <td>'.$row['_user_email_'].'</td>
            <td>'.$row['_user_phone_no_'].'</td>
            <td>'.$row['_user_street_'].', '.$row['_user_city_'].'</td>
            <td class="text-center"><a href=""><i><i class="fas fa-times-circle"></i></i></a></td>
            </tr>';
          }
        } else {
          echo '<h4>no registred users found</h4>';

        }
          ?>
            
          </tbody>
        </table>
      </div>
    </div>
  <div class="tab-pane fade" id="pills-delete" role="tabpanel" aria-labelledby="pills-delete-tab">
  
  <h2>Registred users</h2>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>User id</th>
              <th>User name</th>
              <th>User email</th>
              <th>User phone</th>
              <th>User address</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          
            include '../includes/db_inc.php';

          //sanitize data that we get from the user
        //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT * FROM `_users_`";
        $results = mysqli_query($connection, $query);
        //number of rows returned after the query executed 
        $queryResults = mysqli_num_rows($results);

        if($queryResults > 0){ 
        while($row = mysqli_fetch_assoc($results)){
          echo '<tr>
            <td>'.$row['_user_id_'].'</td>
            <td>'.$row['_user_first_name_'].' '.$row['_user_last_name_'].'</td>
            <td>'.$row['_user_email_'].'</td>
            <td>'.$row['_user_phone_no_'].'</td>
            <td>'.$row['_user_street_'].', '.$row['_user_city_'].'</td>
            <td class="text-center"><a href=""><i><i class="fas fa-times-circle"></i></i></a></td>
            </tr>';
          }
        } else {
          echo '<h4>no registred users found</h4>';

        }
          ?>
            
          </tbody>
        </table>
      </div>

  </div>
</div>

      </div>

      
    </main>
  </div>
</div>
<?php
  include 'footer.php'
?>
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
          <a class="nav-link active submenu-font" id="pills-create-tab" data-toggle="pill" href="#pills-create" role="tab" aria-controls="pills-create" aria-selected="true">Create booking <i class="fas fa-plus-circle"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link  submenu-font" id="pills-view-tab" data-toggle="pill" href="#pills-view" role="tab" aria-controls="pills-view" aria-selected="true">View customer bookings <i class="fas fa-eye"></i> </a>
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

  <div class=" tab-pane fade show active" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab">

        <?php 
        include '../includes/booking.php';
        ?>
  
  </div>
  <div class="tab-pane fade show" id="pills-view" role="tabpanel" aria-labelledby="pills-view-tab">
  <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
          <thead>
            <tr>
              <th>Booking id</th>
              <th>User name</th>
              <th>User email</th>
              <th>User phone</th>
              <th>User address</th>
              <th>Date</th>
              <th>Tickets no.</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          
            include '../includes/db_inc.php';

          //sanitize data that we get from the user
        //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT b._id_ , CONCAT(u._user_first_name_, ' ', u._user_last_name_ ) as 'user name', u._user_email_ , u._user_phone_no_ , t._title_, b._date_, b._number_of_tickets_ FROM _booked_guided_tours_ b INNER JOIN _users_ u on b._user_id_ = u._user_id_ INNER JOIN _tours_ t on b._tour_id_ = t._id_ ";
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
            <td>'.$row['_date_'].'</td>
            <td>'.$row['_number_of_tickets_'].'</td>
            </tr>';
          }
        } else {
          echo '<h4>no customer bookings found</h4>';

        }
          ?>
            
          </tbody>
        </table>
      </div>
  </div>
  <div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
  <h2>Edit customer bookings</h2>
      <hr>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th>Booking id</th>
              <th>User name</th>
              <th>User email</th>
              <th>User phone</th>
              <th>User address</th>
              <th>Date</th>
              <th>Tickets no.</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          
            include '../includes/db_inc.php';

          //sanitize data that we get from the user
        //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT b._id_ , CONCAT(u._user_first_name_, ' ', u._user_last_name_ ) as 'user name', u._user_email_ , u._user_phone_no_ , t._title_, b._date_, b._number_of_tickets_ FROM _booked_guided_tours_ b INNER JOIN _users_ u on b._user_id_ = u._user_id_ INNER JOIN _tours_ t on b._tour_id_ = t._id_ ";
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
            <td>'.$row['_date_'].'</td>
            <td>'.$row['_number_of_tickets_'].'</td>
            </tr>';
          }
        } else {
          echo '<h4>No customer bookings found</h4>';

        }
          ?>
            
          </tbody>
        </table>
      </div>
    </div>
  <div class="tab-pane fade" id="pills-delete" role="tabpanel" aria-labelledby="pills-delete-tab">
  
  <h2>Delete customer bookings</h2>
      <hr>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th>Booking id</th>
              <th>User name</th>
              <th>User email</th>
              <th>User phone</th>
              <th>User address</th>
              <th>Date</th>
              <th>Tickets no.</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          
            include '../includes/db_inc.php';

          //sanitize data that we get from the user
        //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT b._id_ , CONCAT(u._user_first_name_, ' ', u._user_last_name_ ) as 'user name', u._user_email_ , u._user_phone_no_ , t._title_, b._date_, b._number_of_tickets_ FROM _booked_guided_tours_ b INNER JOIN _users_ u on b._user_id_ = u._user_id_ INNER JOIN _tours_ t on b._tour_id_ = t._id_ ";
        $results = mysqli_query($connection, $query);
        //number of rows returned after the query executed 
        $queryResults = mysqli_num_rows($results);

        if($queryResults > 0){ 
        while($row = mysqli_fetch_assoc($results)){
          echo '<tr class="text-center">
            <td>'.$row['_id_'].'</td>
            <td>'.$row['user name'].'</td>
            <td>'.$row['_user_email_'].'</td>
            <td>'.$row['_user_phone_no_'].'</td>
            <td>'.$row['_title_'].'</td>
            <td>'.$row['_date_'].'</td>
            <td>'.$row['_number_of_tickets_'].'</td>
            <td>
            <a class="delete" href="../includes/delete.php?id='.$row['_id_'].'&action=booking"><i class="fas fa-trash-alt "></i></a>
            </td>
            </tr>';
          }
        } else {
          echo '<h4>No customer bookings found</h4>';

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
  include 'footer.php'
?>
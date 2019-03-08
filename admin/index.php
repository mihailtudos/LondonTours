<?php 
  include 'navigation.php';
?>

<style>
.active-dashboard  {
  color: blue;
  font-weight: bold;
  font-size: 20px;
  background: skyblue;
}
</style>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
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
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>



      <h2>Bookings </h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
          <thead>
            <tr>
              <th>User id</th>
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
          echo '<h4>no registred users found</h4>';

        }
          ?>
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?php
  include 'footer.php'
?>

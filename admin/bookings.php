<?php
  //include the navigation of the website 
  include 'navigation.php';
?>
  <!-- include the css file and some style that make the menu option selected -->
<style>
<?php 
  include 'css/style.css';
?>
.active-bookings  {
  color: blue;
  font-weight: bold;
  font-size: 20px;
  background: skyblue;
}
</style>


<!-- start of the main container  -->
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
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
      <!-- container for the horizontal menu -->
      <div class="">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active submenu-font" id="pills-view-tab" data-toggle="pill" href="#pills-view" role="tab" 
          aria-controls="pills-view" aria-selected="true">View customer bookings <i class="fas fa-eye"></i> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link submenu-font" href="createBooking.php">Create booking <i class="fas fa-plus-circle"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link submenu-font" href="editBookings.php">Edit booking <i class="fas fa-pencil-alt"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link submenu-font"  href="deleteBookings.php" >Delete booking <i class="fas fa-trash"></i></a>
        </li>
      </ul>
         <hr>
        <div class="tab-content" id="pills-tabContent">
<!-- container that wraps the table and retrieved data -->
  <div class=" tab-pane fade show " id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab">
  </div>
  <div class="tab-pane fade show active" id="pills-view" role="tabpanel" aria-labelledby="pills-view-tab">
    <h2>View customer bookings</h2>
    <hr>
    <div class="table-responsive">
          <table class="table table-striped table-sm text-center">
            <thead>
              <tr>
                <th>Ref</th>
                <th>User name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Ticket</th>
                <th>Date</th>
                <th>Tickets no.</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
            //includes database connection script 
              include '../includes/db_inc.php';
          //prepares the sql query
          $query = "SELECT b._id_ , CONCAT(u._user_first_name_, ' ', u._user_last_name_ ) as 
          'user name', b._contact_email_ , b._contact_number_ , b._address_, t._title_, b._date_, b._number_of_tickets_ 
          FROM _booked_guided_tours_ b INNER JOIN _users_ u on b._user_id_ = u._user_id_ 
          INNER JOIN _tours_ t on b._tour_id_ = t._id_ ";
          //stores the results of the query
          $results = mysqli_query($connection, $query);
          //number of rows returned after the query executed 
          $queryResults = mysqli_num_rows($results);
          //if there were records returned then fetch data in an associative array 
          if($queryResults > 0){ 
          //fetch data in an associative array and display the data in an iterative way (while) until the end is reached 
          while($row = mysqli_fetch_assoc($results)){
            //a table row will be created everytime the rows are assicated and should be equal with the number of records 
            echo '<tr>
              <td>'.$row['_id_'].'</td>
              <td>'.$row['user name'].'</td>
              <td>'.$row['_contact_email_'].'</td>
              <td>'.$row['_contact_number_'].'</td>
              <td>'.$row['_address_'].'</td>
              <td>'.$row['_title_'].'</td>
              <td>'.$row['_date_'].'</td>
              <td>'.$row['_number_of_tickets_'].'</td>
              <td>
                
                <a class="edit-btn" href="../includes/edit.php?id='.$row['_id_'].'&action=adminEdit">
                <i class="fas fa-edit"></i></a>
                <a class="delete-btn delete" href="../includes/delete.php?id='.$row['_id_'].'&action=booking">
                <i class="fas fa-trash-alt "></i></a>

              </td>
              </tr>';
            }
            mysqli_close($connection);
          } else {
            echo '<h4>no customer bookings found</h4>';
            mysqli_close($connection);
          }
            ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

<?php
  //includes the footer of the web site
  include 'footer.php'
?>



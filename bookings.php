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
    <div class="container-fluid user-bookings-account text-center">
        <h1>Bookings</h1>
    <div class="table-responsive">
          <table class="table table-striped table-sm">
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
            
              include 'includes/db_inc.php';

            //sanitize data that we get from the user
          //$searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
          $query = "SELECT b._id_ , CONCAT(u._user_first_name_, ' ', u._user_last_name_ ) as 'user name', b._contact_email_ , b._contact_number_ , b._address_, t._title_, b._date_, b._number_of_tickets_ FROM _booked_guided_tours_ b INNER JOIN _users_ u on b._user_id_ = u._user_id_ INNER JOIN _tours_ t on b._tour_id_ = t._id_ ";
          $results = mysqli_query($connection, $query);
          //number of rows returned after the query executed 
          $queryResults = mysqli_num_rows($results);

          if($queryResults > 0){ 
          while($row = mysqli_fetch_assoc($results)){
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
                <a class="edit-btn" href="../includes/edit.php?id='.$row['_id_'].'&action=adminEdit"><i class="fas fa-edit"></i></a>
                <a class="delete-btn delete" href="../includes/delete.php?id='.$row['_id_'].'&action=booking"><i class="fas fa-trash-alt "></i></a>
              </td>
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
           
        

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="js/form-validation.js"></script></body>
<?php 
  include 'footer.php';
?>
        </html>



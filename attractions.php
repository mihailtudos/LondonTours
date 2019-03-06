<?php
 include_once 'header.php';
?>
<?php
    include 'includes/db_inc.php';
?>

<style>
<?php include('css/style.css');?>

.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
}

</style>
  <!-- Custom styles for this template -->
  <link href="css/carousel.css" rel="stylesheet">
  <body>
  

<main  role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      
    <?php 
      $query = "SELECT * FROM `_attractions_`";
      $results = mysqli_query($connection, $query);
      //number of rows returned after the query executed 
      $queryResults = mysqli_num_rows($results);
      if($queryResults > 0){
        while($row = mysqli_fetch_assoc($results)){
          echo'
          <div class="carousel-item ">
      <img id="carousel-img" class="bd-placeholder-img" width="100%" height="100%" src="img/attractions/large/'.$row['_id_'].'.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
        <div class="container">
          <div class="carousel-caption">
            <h1>'.$row['_title_'].'</h1>
            <p>'.$row['_subtitle_'].'</p>
            <p><a class="btn btn-lg btn-primary learn-more-btn" href="#'.$row['_id_'].'" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
          ';
        }
      }else{
          echo '';
      }
      ?>


      
      <div class="carousel-item active">
      <img id="carousel-img" class="bd-placeholder-img" width="100%" height="100%" src="img/attractions/large/default.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
        <div class="container">
          <div class="carousel-caption">
            <h1>Discover London</h1>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <?php 
      $query = "SELECT * FROM `_attractions_`";
      $results = mysqli_query($connection, $query);
      //number of rows returned after the query executed 
      $queryResults = mysqli_num_rows($results);
      if($queryResults > 0){
        while($row = mysqli_fetch_assoc($results)){
          echo'
          <div id="'.$row['_id_'].'" class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="img/attractions/'.$row['_id_'].'.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <div class="title-padding">
            <h2 >'.$row['_title_'].'</h2>
            </div>
            <p class="subtitle-attraction">'.$row['_subtitle_'].'</p>
            <p><a class="btn btn-primary" href="ticket.php?id='.$row['_id_'].'" role="button">View details &raquo;</a> <a class="btn btn-success" href="check-out.php?id='.$row['_id_'].'"  name="'.$row['_id_'].'" role="button"><i class="fas fa-credit-card"></i> Buy</a></p>
          </div><!-- /.col-lg-4 -->
          ';
        }
      }else{
          echo '<h2 class="text-center">No attractions found</h2>';
      }
      ?>
    </div><!-- /.row -->


    

  </div><!-- /.container -->


  <!-- FOOTER -->
  
</main>
<?php 
  include 'footer.php';
?>
</html>

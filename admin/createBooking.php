<?php 
  include 'navigation.php';
?>

<style>
.active-create  {
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
      </ul>
         <hr>
        <div class="tab-content" id="pills-tabContent">

  <div class=" tab-pane fade show active" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab">

        <?php 
        include '../includes/booking.php';
        ?>
  
  </div>
</div>

      </div>
    </main>
  </div>
</div>


<?php
  include 'footer.php'
?>
<?php
    include 'header.php';
?>
<?php
    include 'includes/db_inc.php';
?>

<style>
<?php include('css/style.css');?>
</style>

<div style="margin-top: 300px" class="container-fluid">
<h1>Search results</h1>
<?php
    if(isset($_POST['btn-search-main'])){
        //sanitize data that we get from the user
        $searchKeyword = trim(mysqli_real_escape_string($connection, $_POST['search-main']));
        if($searchKeyword == ""){
            echo "<h4>No matches found 0 results</h4>";

            echo '<!-- Button trigger modal -->
            <a href="" data-toggle="modal" data-target="#searchTips">
                Advanced Search Tips
            </a>
            
            <!-- Modal -->
            <div class="modal fade" id="searchTips" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Search type</th>
                      <th scope="col">Search syntax</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Description</th>
                      <td>Route A is</td>
                    </tr>
                    <tr>
                      <th scope="row">Exact keyword</th>
                      <td>Route, Ticket</td>
                    </tr>
                  </tbody>
                </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>';

            echo '
            <form class="form-inline" action="search-main.php" method="POST" autocomplete="off">
					 <div id="search-box-main" class="input-group">
						<div class="input-group-prepend">
						<button type="submit" name="btn-search-main"><div class="input-group-text"><i class="fa fa-search"></i></div></button>
						</div>
						<input name="search-main" type="search" class="form-control " id="inlineFormInputGroupSearch" placeholder="Search" >
					</div>
			</form>
            ';
        } else{

        
            $query = "SELECT * FROM `_tours_` WHERE `_title_` LIKE '%$searchKeyword%' OR `_short_description_` LIKE '%$searchKeyword%' OR `_full_description_` LIKE '%$searchKeyword%'
            OR `_region_` LIKE '%$searchKeyword%' OR `_color_` LIKE '%$searchKeyword%'";
            $results = mysqli_query($connection, $query);
            //number of rows returned after the query executed 
            $queryResults = mysqli_num_rows($results);
            if($queryResults == 1){
                echo "<h4>There was found ".$queryResults." result</h4>";
            } elseif ($queryResults > 1){
                echo "<h4>There was found ".$queryResults." results</h4>";
            }else{
                echo "<h4>No matches found ".$queryResults." results</h4>";
            }
        
    if($queryResults > 0){
        echo '<div class="container searchResultContainer">';
        while($row = mysqli_fetch_assoc($results)){
            //echo a media elemet that displays searched ticket or toure and will send the id of the tour to the new page
            echo '
                    <div class="media searchResult">
                    <img src="img/foundIcon.png" class="align-self-start mr-3" alt="articol image icon">
                    <div class="media-body">
                        <a href="ticket.php?id='.$row['_id_'].'"><h5 class="mt-0">'.$row['_title_'].'</h5></a>
                        <p>'.$row['_short_description_'].'</p>
                        <hr>
                        <p>'.$row['_full_description_'].'</p>
                    </div>
                    </div>';
        }
        echo ' </div>';
    }else{
        echo "nothing";
        }
    }
}
?>
 </div>
<?php
	include_once 'footer.php';
?>
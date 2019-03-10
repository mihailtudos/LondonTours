<?php
  //include the header script
  include 'header.php';
?>
<?php
  //include database connection script
  include 'includes/db_inc.php';
?>
<!-- force the connection of CSS file -->
<style>
<?php include('css/style.css');?>
</style>
<!-- main heading and starting of the container that contains the sesults -->
<div style="margin-top: 300px" class="container-fluid">
<h1>Search results</h1>

<?php
    //if thepage was accessed by clicking on the search button then go to next step
    if(isset($_POST['btn-search-main'])){
        //sanitize data that came from the user
        $searchKeyword = trim(mysqli_real_escape_string($connection, $_POST['search-main']));

        if($searchKeyword == ""){
            echo "<h4>No matches found 0 results</h4>";
        } else{
            $query = "SELECT * FROM `_tours_` WHERE `_title_` LIKE '%$searchKeyword%' OR `_short_description_` 
            LIKE '%$searchKeyword%' OR `_description_` LIKE '%$searchKeyword%'
            OR `_region_` LIKE '%$searchKeyword%' OR `_color_` LIKE '%$searchKeyword%' OR `_date_` LIKE '%$searchKeyword%'";
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
                                <p>'.$row['_description_'].'</p>
                            </div>
                            </div>';}
                echo ' </div>';
            }else{
                echo "nothing";
                }
          }

    }//if the page was accessed without the search button being pressed the flow will redirect the user to home page
    else {
        header("Location: index.php");
        exit();
    }
?>
 </div>
<?php
  //include the footer script
	include_once 'footer.php';
?>
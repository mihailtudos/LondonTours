<?php
    include 'header.php';
?>
<?php
    include 'includes/db_inc.php';
?>



<div style="margin-top: 200px" class="container-fluid">
<h1>Searsasd ch results</h1>
<?php
    if(isset($_POST['btn-search-main'])){
        //sanitize data that we get from the user
        $searchKeyword = mysqli_real_escape_string($connection, $_POST['search-main']);
        $query = "SELECT * FROM `_tours_` WHERE `_title_` LIKE '%$searchKeyword%' OR `_description_` LIKE '%$searchKeyword%'";
        $results = mysqli_query($connection, $query);
        //number of rows returned after the query executed 
        $queryResults = mysqli_num_rows($results);

        if($queryResults == 1){
            echo "<h4>There was found ".$queryResults." result</h4>";
        } elseif ($queryResults >1 ){
            echo "<h4>There was found ".$queryResults." results</h4>";
        }else{
            echo "<h4>No matches found ".$queryResults." results</h4>";
        }

    if($queryResults > 0){
        while($row = mysqli_fetch_assoc($results)){
            //echo a media elemet that displays searched ticket or toure and will send the id of the tour to the new page
            echo '
                <div class="container">
                    <div class="media">
                    <img src="img/routB.png" class="align-self-start mr-3" alt="articol image icon">
                    <div class="media-body">
                        <a href="ticket.php?id='.$row['_id_'].'"><h5 class="mt-0">Top-aligned media</h5></a>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    </div>
                    </div>
                    </div>';
        }
    }else{
        echo "nothing";
        }
    }
?>
 </div>
<?php
	include_once 'footer.php';
?>
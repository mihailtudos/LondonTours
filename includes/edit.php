<?php 
include 'db_inc.php';

$id = $_GET['id'];
$action = $_GET['action'];
if(isset($_GET['id'])){
    if($action == 'adminEdit'){

        $query = "       SELECT b._id_ , u._user_first_name_, u._user_last_name_, u._user_email_ , u._user_phone_no_ , t._title_, b._date_, b._number_of_tickets_, b._address_, b._city_, b._postcode_ FROM _booked_guided_tours_ b INNER JOIN _users_ u on b._user_id_ = u._user_id_ INNER JOIN _tours_ t on b._tour_id_ = t._id_";
        $results = mysqli_query($connection, $query);
        //number of rows returned after the query executed 
        $row = mysqli_fetch_assoc($results);
                
         
        


        echo '<!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Edid booking '.$id.'</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/style.css">
            <!-- jQuery latest version CDN connection -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <!-- popper js latest version CDN connection -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <!-- bootstrap minified latest version CDN connection -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <!-- fontawesome (icons) latest version CDN connection -->
            <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
            <!-- local CSS file -->
        
            <!-- Bootstrap core CSS -->
        <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm("Are you sure you want to delete this booking?")){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
        </script>
            <!-- Custom styles for this template -->
            <link href="..\admin\css\style.css" rel="stylesheet">
        </head>
        <body>
        <h1 class="text-center addMargin">Edit Booking</h1>

            <div class="container margin-bottom">
            <form action="../includes/insert.php?id='.$id.'" method="POST" class="needs-validation" novalidate>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" name="firstName" class="form-control" id="firstName" value="'.trim($row['_user_first_name_']).'" required readonly>
                    <div class="invalid-feedback">
                    Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" name="secondName" class="form-control" id="lastName" value="'.trim($row['_user_last_name_']).'" required readonly>
                    <div class="invalid-feedback">
                    Valid last name is required.
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6 mb-3">
                <label for="email">Email </label>
                <input type="email" name="email" class="form-control"  value="'.trim($row['_user_email_']).'" required>
                <div class="invalid-feedback">
                    Please enter a valid email address for further updates.
                </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="state">Phone number</label>
                    <input type="number" name="phoneNumber" class="form-control" id="number" value="'.trim($row['_user_phone_no_']).'" required>
                    <div class="invalid-feedback">
                    Please provide a valid state.
                    </div>
                </div>
                
                </div>

                <div class="row">
                <div class="col-md-5 mb-3">
                <label for="validationCustom03">Chosen Route</label>
                <select name="tour" class="form-control">
                <option selected>'.trim($row['_title_']).'</option>';
                                          
                                            $query = "SELECT _title_ FROM `_tours_`";
                                            $results = mysqli_query($connection, $query);
                                            //number of rows returned after the query executed 
                                            $queryResults = mysqli_num_rows($results);
                                            if($queryResults > 0){ 
                                                while($data = mysqli_fetch_assoc($results)){
                                                    if($data['_title_'] == trim($row['_title_'])){
                                                        continue;
                                                    }
                                                    echo '<option name="tour">'.$data['_title_'].'</option>';
                                                }
                                            }else{
                                                echo "<option>No rote found</option>";
                                            }
                                            
                                            echo'
                                        </select>
                    <div class="invalid-feedback">
                    Please select a valid country.
                    </div>
                </div>


                <div class="col-md-4 mb-3">
                <div class="bootstrap-iso">
                    <label for="validationCustom04">Date</label>
                    <input class="form-control" id="date" name="date" value="'.trim($row['_date_']).'" type="text" required/>
                    <div class="invalid-feedback">
                    Please provide a valid date.
                    </div>
                </div>
                </div>


                <div class="col-md-3 mb-3">
                    <label for="zip">No. of tickets</label>
                    <input type="number" name="number"  class="form-control"  value="'.trim($row['_number_of_tickets_']).'" required>
                    <div class="invalid-feedback">
                    A valid number is required.
                    </div>
                </div>
                </div>


                <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="street" class="form-control" id="address" value="'.trim($row['_address_']).'" required>
                <div class="invalid-feedback">
                    Please enter your shipping address.
                </div>
                </div>


                <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="country">City</label>
                    <input type="text" name="city" class="form-control" id="city" value="'.trim($row['_city_']).'">
                    <div class="invalid-feedback">
                    Please enter a valid city.
                    </div>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="postcode">Zip</label>
                    <input type="text" name="postcode" class="form-control" id="postcode" value="'.trim($row['_postcode_']).'" required>
                    <div class="invalid-feedback">
                    Post code required.
                    </div>
                </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" name="save" type="submit">Save</button>
         </form>
        </div>

        ';

        

        include '../admin/footer.php';



    }else{
        echo '<!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Edid booking '.$id.'</title>
        
        
        
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/style.css">
            <!-- jQuery latest version CDN connection -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <!-- popper js latest version CDN connection -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <!-- bootstrap minified latest version CDN connection -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <!-- fontawesome (icons) latest version CDN connection -->
            <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
            <!-- local CSS file -->
        
            <!-- Bootstrap core CSS -->
        <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm("Are you sure you want to delete this booking?")){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
        </script>
            <!-- Custom styles for this template -->
            <link href="..\admin\css\style.css" rel="stylesheet">
        </head>
        <body>
        <h1 class="text-center addMargin">Edit Booking</h1>
        ';

        include 'booking.php';

        echo '</body>
        </html>';
        }
}else{
    
}




?>

<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

/* -------------
QUERY
------------- */
$sql = "SELECT * FROM * ";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cars Locations</title>

<link rel="shortcut icon" href="style/img/favicon.png" type="image/x-icon"/>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"></head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/main.css">


<body>
    <div class="container">
<!-- .............
NAVBAR
............... -->
<?php include('nav.php'); ?>

<!-- .............
CONTENT AFTER LOGIN
............. -->

<!-- ............
select location filter -->    
<form action="filter/filter.php" method="post">
    <div class="select">
        <select name="locValue">
            <option> -- Select location -- </option>
            <option value="11">22th district</option>
            <option value="12">14th district</option>
            <option value="13">Vienna Airport</option>
            <option value="14">10th district</option>
            <option value="15">23th district</option>
            <option value="16">11th district</option>
            <option value="17">1st district</option>
        </select>
            <div class="select_arrow">
            </div>
    </div>
    <div>
        <span class="input-group-btn">
                <input class="btn btn-color" type="submit" name="submit" value="Get Selected Values" />
        </span>
    </div>
</form>




<!-- <button type="button" class="btn btn-outline-dark btn-md btn-block" id="toggleFn">Click to toggle details</button> -->
<div class="row col-xs-12 col-sm-12 col-md-6 col-lg-9 col-xl-12">

<?php
   $sql = "SELECT *
   FROM car_data
   INNER JOIN loc_data ON car_data.fk_loc_id = loc_data.loc_id; ";
   
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo "<div class='card cars_card'>";
        echo "  <div><img class='img card-img-top' src='" . $row['img'] . "' alt='cars'></div>";
        echo "  <div class='card-body'>";
        echo " <h5 class='card-title'><b>Current location: </b><span class='badge badge-info'>". $row['loc_name']."</span></h5>";
        echo "    <p class='card-text'>". $row['car_manufacturer'] . " " . $row['car_model']. "</p>";
                echo "<ul class='list-group list-group-flush'>";
                    echo "<li class='list-group-item'>Price per day is " . $row['car_price'] . " €</li>";
                    echo "<li class='list-group-item'>Max of " . $row['car_passenger'] . " passengers</li>";
                echo "</ul>";
        echo "  </div>";
        echo "</div>";
    }
    } else {
    echo "0 results";
    }

    $conn->close();
   
?>
</div>
    </div>
    <script src="script/main.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
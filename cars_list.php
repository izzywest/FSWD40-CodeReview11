<?php
ob_start();
session_start();
// require_once 'dbconnect.php';
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
//  header("Location: index.php");
 header("Location: index.php");
 exit;
}
// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

/* -------------
QUERY
------------- */
$sql = "SELECT * FROM media INNER JOIN author ON media.fk_authorId = author.authorId INNER JOIN publisher ON media.fk_publisherId = publisher.publisherId";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome <?php echo $userRow['userName']; ?></title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"></head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>



<body>
    <div class="container">

        <div class="alert alert-secondary" style="height: 250px; background-image: url('style/img/dash.jpg'); background-repeat: no-repeat; background-position: center; text-align: right;">
            <p class="h6"><span class="badge badge-light">Logged in as <b><i class="fas fa-user"></i> <?php echo $userRow['userName']; ?> </b></span></p> 	 	
            <a href="logout.php?logout"><button type="button" class="btn btn-info">Sign out <span class="badge badge-light"><i class="fas fa-sign-out-alt"></i></span></button></a>
        </div>
<!-- .............
CONTENT AFTER LOGIN
............. -->
<div class="container row col-xs-1 col-sm-6 col-md-6 col-lg-9 col-xl-12">
<?php
   $sql = "SELECT car_id, car_manufacturer, car_model, car_mod_year, car_reg_year, car_price, car_passenger, car_km, img  FROM car_data";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo "<div class='card' style='width: 18rem;'>";
        echo "  <img class='card-img-top' src='" . $row['img'] . "' alt='cars'>";
        echo "  <div class='card-body'>";
        echo "    <h5 class='card-title'>" . $row['userName'].  "</h5>";
        echo "    <p class='card-text'>". $row['car_manufacturer'] . " " . $row['car_model']. "</p>";
        echo "    <a href='#' class='btn btn-primary'>SHOW</a>";
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
</body>
</html>
<?php ob_end_flush(); ?>
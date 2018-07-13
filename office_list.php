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
<title>Office list</title>

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
<div class="row">

<!-- left column -->
    <div class="col"> 
    <?php
        $sql = "SELECT * FROM offices INNER JOIN loc_data ON offices.fk_loc_id = loc_data.loc_id;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='loc_list'>";
                echo "<ul class='list-group list-group-flush'>";
                echo "<li class='list-group-item'><b>Office " . $row['office_name'] . "</b>, in " . $row['loc_name'] . "</li>";
                echo "</ul>";
                echo "</div>";
            }
            } else {
            echo "0 results";
            }

            $conn->close();   
    ?>
 </div>

<!-- right column -->






    <div class="col">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhm1NjYliGN43KTiyer8qPKdI7C_nVaq0&callback=initMap"></script>

        <script type="text/javascript">
            function initialize() {
           
                var mapOptions = {
                    zoom: 11,
                    center: new google.maps.LatLng(48.199050, 16.446690),
                    mapTypeId: google.maps.MapTypeId.MAP
                };
                var map = new google.maps.Map(document.getElementById("map-location"),
                    mapOptions);


        var icons = {
          parking: {
            icon: 'style/img/caricon.png'
          },
          info: {
            icon: 'style/img/officeicon.png'
          }
        };



var features = [
          {
            position: new google.maps.LatLng(48.238952, 16.461739),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(48.207358, 16.270696),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(48.116142, 16.566010),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(48.158482, 16.394691),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(48.159582, 16.284142),
            type: 'info'
          }, {
            position: new google.maps.LatLng(48.149868, 16.387635),
            type: 'info'
          }, {
            position: new google.maps.LatLng(48.204421, 16.374607),
            type: 'info'
          }, {
            position: new google.maps.LatLng(48.271368, 16.413731),
            type: 'info'
          }, {
            position: new google.maps.LatLng(48.271368, 16.418482),
            type: 'info'
          }, {
            position: new google.maps.LatLng(48.189870, 16.370377),
            type: 'info'
          }
];
  
        // Create markers.
        features.forEach(function(feature) {
                var marker = new google.maps.Marker({
                    position: feature.position,
                    icon: icons[feature.type].icon,
                    map: map
                });
                });
            }
            google.maps.event.addDomListener(window, 'resize', initialize);
            google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div id="map-location">

    </div>
    </div>

  </div>

    </div> <!-- close container div -->
</body>
</html>
<?php ob_end_flush(); ?>

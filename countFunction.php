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
<title>Welcome <?php echo $userRow['userName']; ?></title>

<link rel="shortcut icon" href="style/img/favicon.png" type="image/x-icon"/>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"></head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/style/main.css">


<body>
    <div class="container">
    <a href="task7.php"><button type="button" class="btn-back btn btn-dark btn-lg btn-block">&#129192; GO BACK</button></a>

<div>

<!-- .........................
GET VALUE FORM COMBO BOX
............................ -->
<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['locValue'];  // Storing Selected Value In Variable
}


   

$sql = "SELECT COUNT(DISTINCT car_id ) AS variable1
FROM car_data 
INNER JOIN loc_data ON car_data.fk_loc_id = loc_data.loc_id 
WHERE loc_id=" . $selected_val . "; ";
$sql2 = "SELECT * FROM loc_data;";


   $result = $conn->query($sql);
   $result2 = $conn->query($sql2);

   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo "<div class='card cars_card'>";
        echo "  <div class='card-body'>";
        echo "    <p class='card-text'>There are ". $row['variable1'] . " cars at the location with the loc_id: " . $selected_val ."</p>";
        echo "  </div>";

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
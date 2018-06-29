<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $password = hash('sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
 
  if( $count == 1 && $row['userPass']==$password ) {
   $_SESSION['user'] = $row['userId'];
   header("Location: home.php");
  } else {
   $errMSG = "Incorrect Credentials, Try again...";
  }
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"></head>

<style>
 body, html {
    height: 100%;
}
form {
    width: 55%;
    margin-left: 5%;
}


.bg {
    background-image: url("style/img/background2.png");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover; 
} 

</style>

</head>
<body class="container">
<div class="bg">

<div>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">   
            <h2><i class="fas fa-sign-in-alt"></i> Sign in</h2>
            <hr/>
           
            <?php
            if ( isset($errMSG) ) {
            echo $errMSG; ?>
            <?php
  }
  ?>
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
            <span class="text-danger"><?php echo $emailError; ?></span><br>
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                <span class="text-danger"><?php echo $passError; ?></span>
            <hr/>
            <button class="btn btn-primary" type="submit" name="btn-login">Sign In</button>
            <hr/>
            <a href="register.php"><button type="button" class="btn btn-dark"><i class="fas fa-user-plus"></i> Sign up here</button></a>
   </form>

</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
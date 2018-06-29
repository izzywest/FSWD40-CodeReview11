<link rel="stylesheet" href="style/main.css">

<div class="nav_img alert alert-secondary"></div>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php"><img class="rotate logo" src="style/img/logoW.png" alt=""></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
        <a class="nav-link" href="cars_list.php">Car list<span class="sr-only"></span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="office_list.php">Office locations</a>
        </li> 
      
        <li class="nav-item">
        <a class="nav-link" href="cars_locations.php">Cars locations</a>
        </li>
      
      </ul>

        <ul class="nav navbar-nav navbar-right">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-secondary"><?php echo $userRow['userName']; ?></span>
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php?logout"><button type="button" class="btn btn-danger">Sign out <span class="badge badge-light"><i class="fas fa-sign-out-alt"></i></span></button></a>
        </div>
      
      </li>
      </ul>
   

  </div>
</nav>
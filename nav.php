<style>
.logo {
  width: 160px;
}


</style>

<div class="alert alert-secondary" style="height: 250px; background-image: url('style/img/bg2s.jpg'); background-repeat: no-repeat; background-position: absolute; background-size: cover; text-align: right;"></div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php"><img class="logo" src="style/img/logoW.png" alt=""></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
        <a class="nav-link" href="cars_list.php">Car list<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
        </li> </ul>
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
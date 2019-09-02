<?php
/**
* Real Estate System
* @author Andrew De Torres <andrewdetorres999@gmail.com>
*/
require_once __DIR__ . '/system/core.php';
$navIsLight = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Profile | Real Estate System | Andrew De Torres</title>
  <?php require_once 'templates/header.php'; ?>
</head>
<body>
<?php
  if ($user->isLoggedIn()) {
    require_once 'templates/auth-navigation.php';
    $userProfile = $profile->getUserProfile();
    ?>

    <!-- <a href="index.php"><button name="Home">Home</button></a><br>
    <a href="update-profile.php"><button name="editProfile">Edit Profile</button></a> -->
    <!-- <div class="container my-5">
      <h1><?php //echo $user->getUsername();?>'s profile</h1>
      <div class="row my-4">

      </div>
      <div class="row">
        <div class="card col-12">

      </div>
    </div> -->


    <div class="container my-5">
      <div class="row">
        <div class="col-lg-8 col-sm-12">
          <div class="row">
              <div class="col-6 mb-4">
                <a href="/my-properties.php" class="text-decoration-none">
                  <div class="card border-left-custom border-custom shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <h6 class="font-weight-bold text-dark text-uppercase mb-1">Properties Listed</h6>
                          <p class="mb-0 text-dark">3</p>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-home fa-2x text-dark"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-6 mb-4">
                <a href="/my-properties.php" class="text-decoration-none">
                  <div class="card border-left-custom border-custom shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <h6 class="font-weight-bold text-dark text-uppercase mb-1">Properties Sold</h6>
                          <p class="mb-0 text-dark">1</p>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-hand-holding-usd fa-2x text-dark"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        <div class="col-lg-4 col-sm-12">
          <div class="card border-custom">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Cras justo odio</li>
              <li class="list-group-item">Dapibus ac facilisis in</li>
              <li class="list-group-item">Vestibulum at eros</li>
            </ul>
            <div class="card-body">
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
    foreach ($userProfile as $field => $v) {
      echo "<p>{$v}</p>";
    }
  }
  else {
    header("location: index.php");
    exit();
  }
?>

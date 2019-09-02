<?php
/**
* Real Estate System
* @author Andrew De Torres <andrewdetorres999@gmail.com>
*/
require_once __DIR__ . '/system/core.php';
$navIsLight = FALSE;
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

    <a href="index.php"><button name="Home">Home</button></a><br>
    <a href="update-profile.php"><button name="editProfile">Edit Profile</button></a>
    <h1><?php echo $user->getUsername();?>'s profile</h1>

    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="/my-properties.php" class="text-decoration-none">
          <div class="card border-left-custom border-custom shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <h6 class="text-xs font-weight-bold text-dark text-uppercase mb-1">Properties Listed</h6>
                  <p class="mb-0 text-dark">3</p>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-dark"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="/my-properties.php" class="text-decoration-none">
          <div class="card border-left-custom border-custom shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <h6 class="text-xs font-weight-bold text-dark text-uppercase mb-1">Properties Listed</h6>
                  <p class="mb-0 text-dark">3</p>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-dark"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="/my-properties.php" class="text-decoration-none">
          <div class="card border-left-custom border-custom shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <h6 class="text-xs font-weight-bold text-dark text-uppercase mb-1">Properties Listed</h6>
                  <p class="mb-0 text-dark">3</p>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-dark"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="/my-properties.php" class="text-decoration-none">
          <div class="card border-left-custom border-custom shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <h6 class="text-xs font-weight-bold text-dark text-uppercase mb-1">Properties Listed</h6>
                  <p class="mb-0 text-dark">3</p>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-dark"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
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

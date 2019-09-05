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

    $date = new DateTime($userProfile['dob']);
    $userDob = $date->format('F jS, Y');

    ?>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-3 col-sm-12 mb-5">
          <div class="card rounded">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $userProfile['firstName'] . ' ' . $userProfile['lastName'];?></h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?php echo $userDob?></li>
              <li class="list-group-item">
                <?php echo $userProfile['addressFirst'] .
                    ', ' . $userProfile['addressSecond'] .
                    ', ' . $userProfile['city'];?>
              </li>
              <li class="list-group-item"><?php echo $userProfile['postcode'];?></li>
              <li class="list-group-item"><?php echo $userProfile['mobile']?></li>
              <li class="list-group-item"><?php echo $userProfile['bio']?></li>
            </ul>
            <div class="card-body">
              <a href="update-profile" class="card-link">Update Profile</a>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-12 mb-5">
          <div class="row">
              <div class="col-md-6 col-lg-6 mt-5">
                <div class="card">
                    <div class="card-header">
                      <div class="custom-icon-panel card-pruple">
                        <i class="fas fa-hand-holding-usd"></i>
                      </div>
                      <p class="card__category">Properties</p>
                      <h3 class="card-title">
                        3
                        <small>Sold</small>
                      </h3>
                    </div>
                    <div class="card-footer"><i class="fa fa-calendar"></i>
                      <a href="">Since Joining MOVE</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 mt-5">
                <div class="card">
                    <div class="card-header">
                      <div class="custom-icon-panel card-pruple">
                        <i class="fas fa-home"></i>
                      </div>
                      <p class="card__category">Properties</p>
                      <p class="card-title">
                        3
                        <small>For Sale</small>
                      </p>
                  </div>
                    <div class="card-footer"><i class="fa fa-calendar"></i>
                      <a href="">Since Joining</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="table-custom col-12 table-striped table-responsive mt-5">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Property</th>
                    <th>view</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Test Property Name</td>
                    <td><button class="btn btn btn-custom" type="submit">View</button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Test Property Name</td>
                    <td><button class="btn btn btn-custom" type="submit">View</button></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Test Property Name</td>
                    <td><button class="btn btn btn-custom" type="submit">View</button></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Test Property Name</td>
                    <td><button class="btn btn btn-custom" type="submit">View</button></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Test Property Name</td>
                    <td><button class="btn btn btn-custom" type="submit">View</button></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Test Property Name</td>
                    <td><button class="btn btn btn-custom" type="submit">View</button></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Test Property Name</td>
                    <td><button class="btn btn btn-custom" type="submit">View</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  else {
    header("location: index.php");
    exit();
  }
?>

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
    $userProperties = $property->getAllUsersProperty();
    $activePropertyCount = $property->getUserPropertyCount();
    $soldPropertyCount = $property->getUserSoldCount();

    $date = new DateTime($userProfile['dob']);
    $userDob = $date->format('F jS, Y');

    ?>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-3 col-9 mx-auto mb-5">
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
          <div class="col-md-6 col-9 mx-auto mt-5">
                <div class="card custom-card">
                    <div class="card-header">
                      <div class="custom-icon-panel card-pruple">
                        <i class="fas fa-home"></i>
                      </div>
                      <p class="card__category">Properties</p>
                      <h3 class="card-title text-right text-dark">
                        <?php echo $activePropertyCount; ?>
                        <small>Active</small>
                      </h3>
                    </div>
                    <div class="card-footer bg-white">
                      <i class="fa fa-calendar"></i>
                      <a href="" class="text-secondary">Current number of active properties</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-9 mx-auto mt-5">
                <div class="card custom-card">
                    <div class="card-header">
                      <div class="custom-icon-panel card-pruple">
                        <i class="fas fa-hand-holding-usd"></i>
                      </div>
                      <p class="card__category">Properties</p>
                      <h3 class="card-title text-right text-dark">
                        <?php echo $soldPropertyCount; ?>
                        <small>Sold</small>
                      </h3>
                    </div>
                    <div class="card-footer bg-white">
                    <i class="fa fa-calendar"></i>
                      <a href="" class="text-secondary">Current number of sold properties</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-custom col-12 table-striped table-responsive mt-5">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Street</th>
                    <th>View</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($userProperties as $k => $values) {
                    ?>
                    <tr>
                      <td><?php echo $values['id']; ?></td>
                      <td><?php echo $values['name_number']; ?></td>
                      <td><?php echo $values['address_first']; ?></td>
                      <td><a href="user-property.php?prop=<?php echo $values['id']; ?>"><button class="btn btn btn-custom" type="submit">View</button></a></td>
                      <td><?php echo $values['status'] ? "Active" : "Sold"; ?></td>
                    </tr>
                    <?php
                  }
                  ?>
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

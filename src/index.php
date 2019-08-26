<?php
  /**
   * Real Estate System
   * @author Andrew De Torres <andrewdetorres999@gmail.com>
   */
  require_once __DIR__ . '/system/core.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Real Estate System | Andrew De Torres</title>
    <?php require_once 'templates/header.php'; ?>
  </head>
  <body>
    <?php
      require_once 'templates/navigation.php';

      if ($user->isLoggedIn()) {
        ?>
          <p>Logged in as <strong><?php echo $user->getUsername(); ?></strong></p>

          <a href="profile.php"><button name="Profile">Profile</button></a>
          <br>
          <a href="new-property.php"><button name="newprop">New Property</button></a>
          <br>
          <a href="my-properties.php"><button name="myprops">My Properties</button></a>

          <?php require_once 'templates/logout.php';
      }
      else {
        require_once 'templates/signup.php';
        require_once 'templates/login.php';
      }
    ?>

    <?php require_once('templates/footer.php'); ?>
  </body>
</html>
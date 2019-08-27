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
        ?>
        <header class="masthead">
          <div class="container h-100">
            <div class="row h-100 align-items-center">
              <div class="col-12 text-center">
                <div class="px-4 d-flex justify-content-center">
                  <form class="form-inline w-75 justify-content-center" action="/action_page.php">
                  <div class="input-group">
                  <span class="input-group-text" id="basic-addon1"><button class="btn btn-outline-light w-25" type="submit">Search</button></span>
                    <input class="form-control w-75 re-radius" type="text" placeholder="Search">
                    
      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </header>

        <?php
        // require_once 'templates/signup.php';
        // require_once 'templates/login.php';
      }
    ?>

    <?php require_once 'templates/footer.php'; ?>
  </body>
</html>
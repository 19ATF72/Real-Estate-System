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

      if ($user->isLoggedIn()) {
        require_once 'templates/auth-navigation.php';
      }
      else {
        require_once 'templates/navigation.php';
      }
      ?>
        <header class="masthead">
          <div class="container h-100">
            <div class="row h-100 align-items-center">
              <div class="col-12 text-center">
                <div class="px-4 d-flex justify-content-center">
                  <form class="form-inline w-75 justify-content-center" action="/action_page.php">
                  <div class="input-group w-75">
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </header>
        <?php
        require_once 'templates/footer.php';
        ?>
  </body>
</html>
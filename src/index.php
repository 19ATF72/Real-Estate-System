<?php
  /**
   * Real Estate System
   * @author Andrew De Torres <andrewdetorres999@gmail.com>
   */
  require_once __DIR__ . '/system/core.php';
  $navIsLight = TRUE;
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
          <div class="col-lg-6 col-md-12 text-center">
            <div class="col-md-6 col-lg-12 mx-auto mb-3">
              <h1 class="text-left text-white">Find the right <span class="emphasis-font">home</span></h1>
              <h1 class="text-left text-white">for you</h1>
              <p class="text-left text-white">Search our properties by typing in your location below</p>
            </div>
            <div class="px-3 d-flex justify-content-center">
              <form class="form-inline col-md-6 col-lg-12 px-0 justify-content-center" action="/action_page.php">
              <div class="input-group w-100">
                <input class="form-control border border-white re-radius" type="text" placeholder="Location">
              <span class="input-group-append " id="basic-addon1">
                <button class="btn btn-custom re-radius" type="submit">Search</button>
              </span>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>
  <?php require_once 'templates/footer.php';?>
</body>
</html>
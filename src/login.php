<?php
  /**
   * Real Estate System
   * @author Andrew De Torres <andrewdetorres999@gmail.com>
   */
  require_once __DIR__ . '/system/core.php';
  $navIsLight = TRUE;

  if (isset($_POST)) {
    if ($_POST['login-post'] == 1) {
      // Assign and call login user
      // echo "lol";
      // exit();
      $result = $site->loginUser($_POST);

      // Return error messages
      if ($result['status'] != 200) {
        $message = $result['message'];
      }
      else {
        // TODO: Change error message
        $message = "Successful Login";
      }
    }
  }
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
    header("location: profile.php");
    exit();
  }
  else {
    require_once 'templates/navigation.php';
  }
?>
<header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="card m-auto col-sm-12 col-lg-6" style="width: 22rem;">
        <div class="card-header bg-white text-center">
          <div class="row justify-content-between align-items-center">
            <div class="col-4">
              <a class="navbar-brand ml-2 logo-font text-dark" href="/index.php">MOVE</a>
            </div>
            <div class="col-4">
              <a href="index.php">
                <button type="button" class="close">
                  <span>&times;</span>
                </button>
              </a>
            </div>
          </div>
        </div>
        <form class="form-signin p-4" action="" method="post">
        <input type="hidden" name="login-post" value="1" />
          <p class="text-danger"><?php echo $message ? $message : ""; ?></p>
          <div class="form-group">
            <input type="text" class="form-control" name="emailusername" id="loginInputEmail1" aria-describedby="emailHelp" placeholder="Username / Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="loginInputPassword1" name="passwd" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-lg btn-custom btn-block text-uppercase" name="login">Login</button>
          <hr class="my-4">
          <button class="btn btn-lg btn-google btn-block text-uppercase" type="button"><i class="fab fa-google mr-2"></i> Log in with Google</button>
          <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="button"><i class="fab fa-facebook-f mr-2"></i> Log in with Facebook</button>
        </form>
      </div>
    </div>
  </div>
<header>
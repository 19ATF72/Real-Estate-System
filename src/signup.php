<?php
  /**
   * Real Estate System
   * @author Andrew De Torres <andrewdetorres999@gmail.com>
   */
  require_once __DIR__ . '/system/core.php';
  $navIsLight = TRUE;

  if (isset($_POST)) {
    if ($_POST['signup-post'] == 1) {
      // Assign and call signup user
      $result = $site->signupUser($_POST);

      // Return error messages
      if ($result['status'] != 200) {
        $message = $result['message'];
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
            <?php if ($_GET['success']) { ?>
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
                <p class="text-success p-4">Sign up sucessful, please <a href="/login.php">log in.</a></p>
              </div>
            <?php } else { ?>
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
                  <input type="hidden" name="signup-post" value="1" />
                  <p class="text-danger"><?php echo $message ? $message : ""; ?></p>
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" id="signupInputusername1" aria-describedby="usernameHelp" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="email" id="signupInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-group">
                        <input type="password" class="form-control" id="signupInputPassword1" name="passwd" placeholder="Password">
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-group">
                        <input type="password" class="form-control" id="signupInputPassword1" name="passwdtwo" placeholder="Reapeat Password">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-lg btn-custom btn-block text-uppercase" name="signup">Sign Up</button>
                  <hr class="my-4">
                  <div class="row">
                    <div class="col-lg-6 col-sm-12 text-center pb-2">
                      <button class="btn btn-google" type="button"><i class="fab fa-google mr-2"></i>Log in with Google</button>
                    </div>
                    <div class="col-lg-6 col-sm-12 text-center">
                      <button class="btn btn-facebook" type="button"><i class="fab fa-facebook-f mr-2"></i> Log in with Facebook</button>
                    </div>
                  </div>
                </form>
              </div>
            <?php } ?>
          </div>
        </div>
      <header>
<?php

require_once __DIR__ . '/../system/core.php';

/**
* Login form for user.
*/

if (isset($_POST)) {
  if ($_POST['login-post'] == 1) {
    // Assign and call login user
    $result = $site->loginUser($_POST);

    echo '<pre>' . var_export($result) . '</pre>';
    exit();
    // Return error messages
    if ($result['status'] != 200) {
      echo $result['message'];
    }
    else {
      // TODO: Change error message
      echo 'yay!';
    }
  }
}
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <a class="navbar-brand text-light ml-2 logo-font" href="#">MOVE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav navbar-right mr-2">
      <li class="nav-item  my-auto mx-3">
        <a class="nav-link text-light" href="#">Home</a>
      </li>
      <li class="nav-item my-auto mx-3">
        <a class="nav-link text-light" href="#">Buy</a>
      </li>
      <li class="nav-item my-auto mx-3">
        <a class="nav-link text-light" href="#">Rent</a>
      </li>
      <li class="nav-item my-auto mx-3">
        <a class="nav-link text-light" href="#">Commercial</a>
      </li>
      <li class="nav-item my-auto mr-4">
        <div class="vertical-divider"><div>
      </li>
      <li class="nav-item my-auto">
        <!-- <a class="nav-link" href="/login.php"> -->
          <button class="btn btn-outline-light" type="submit" data-toggle="modal" data-target="#exampleModal">Log In</button>
        <!-- </a> -->
      </li>
      <li class="nav-item my-auto">
        <a class="nav-link" href="/signup.php">
          <button class="btn btn-outline-light" type="submit">Sign Up</button>
        </a>
      </li>
    </ul>
    </div>
  </nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" name="login-post" value="1" />
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" name="emailusername" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username / Email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="passwd" placeholder="Password">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="login">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
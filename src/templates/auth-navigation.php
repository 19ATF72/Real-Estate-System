<?php
if (isset($_POST)) {
  if ($_POST['logout-post'] == 1) {
    // Logout user
    $site->logoutUser();
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
      <li class="nav-item  my-auto">
        <a class="nav-link text-light" href="#">Home</a>
      </li>
      <li class="nav-item my-auto">
        <a class="nav-link text-light" href="#">Link 1</a>
      </li>
      <li class="nav-item my-auto">
        <a class="nav-link text-light" href="#">Link 2</a>
      </li>
      <li class="nav-item my-auto">
        <a class="nav-link" href="#">
          <form action="" method="post">
            <input type="hidden" name="logout-post" value="1" />
            <button class="btn btn-outline-light" type="submit" name="logout">Log Out</button>
          </form>
        </a>
      </li>
      <li class="nav-item my-auto dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" alt="Avatar" class="avatar rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    </div>
  </nav>
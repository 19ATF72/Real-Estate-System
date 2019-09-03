<?php
if (($_POST)) {
  if ($_POST['logout-post'] == 1) {
    // Logout user
    $site->logoutUser();
  }
}
?>

<nav class="navbar navbar-expand-lg fixed-top <?PHP echo ($navIsLight) ? 'navbar-light': 'navbar-custom'; ?>">
  <a class="navbar-brand ml-2 logo-font text-white" href="index.php">MOVE</a>
  <button class="navbar-toggler  custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav navbar-right mr-2">
      <li class="nav-item active my-auto mx-3">
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
      <li class="nav-item my-auto mr-2">
        <a class="nav-link" href="#">
          <form action="" method="post">
            <input type="hidden" name="logout-post" value="1" />
            <button class="btn btn-outline-light" type="submit" name="logout">Log Out</button>
          </form>
        </a>
      </li>
      <li class="nav-item my-auto dropdown">
        <a class="nav-link dropdown-toggle" href="/profile.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" alt="Avatar" class="avatar rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/profile.php">Profile</a>
          <a class="dropdown-item" href="/new-property.php">New Property</a>
          <a class="dropdown-item" href="/my-properties.php">My Properties</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Account Settings</a>
        </div>
      </li>
    </ul>
    </div>
  </nav>
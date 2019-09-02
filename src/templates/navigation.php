<?php

require_once __DIR__ . '/../system/core.php';

/**
* Login form for user.
*/
?>

<nav class="navbar navbar-expand-lg fixed-top <?PHP echo ($navIsLight) ? 'navbar-light': 'navbar-custom'; ?>">
  <a class="navbar-brand ml-2 logo-font text-white" href="/index.php">MOVE</a>
  <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <a href="login.php">
          <button class="btn btn btn-outline-light" type="submit">Log In</button>
        </a>
      </li>
      <li class="nav-item my-auto mx-2">
      <a href="signup.php">
          <button class="btn btn btn-outline-light" type="submit">Sign Up</button>
        </a>
      </li>
    </ul>
    </div>
  </nav>
<?php
  namespace RealEstate;
  session_start();
  require_once "config.php";
  require_once "autoloader.php";

  use RealEstate\Core\{Database, Site, User};
  use RealEstate\Classes\{Profile, Property};

  $user = new User([]);
  $db = new Database($dbData);
  $site = new Site();
  $property = new Property();
  $profile = new Profile();

  if (isset($_SESSION) && isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email'])) {
    global $user;
    $user = new User($_SESSION);
  }
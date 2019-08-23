<?php

require_once __DIR__ . '/system/core.php';

/**
* Create new profile for a user
*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Profile | Real Estate System | Andrew De Torres</title>
    <?php require_once 'templates/header.php'; ?>
  </head>
  <body>
    <?php
if ($user->isLoggedIn()) {
  $userProfile = $profile->getUserProfile();
}

?>

<a href="index.php"><button name="Home">Home</button></a>
<br>
<a href="update-profile.php"><button name="editProfile">Edit Profile</button></a>
<h1><?php echo $user->getUsername();?>'s profile</h1>
<?php
foreach ($userProfile as $field => $v) {
  echo "<p>{$v}</p>";
}
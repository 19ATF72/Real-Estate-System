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

  if (isset($_POST)) {
    if ($_POST['profile-post'] == 1) {

      // Create / Update user profile.
      $result = $profile->createUserProfile($_POST);

      // Return error messages
      if ($result['status'] != 200) {
        echo $result['message'];
      }
      else {
        // TODO: change error message
        echo 'yay!';
      }
    }
  }
}
?>
<a href="index.php"><button name="profile">Home</button><a>
<br>
<a href="profile.php"><button name="Profile">Profile</button></a>
<h3>Update Profile</h3>
<form action="" method="post">
  <input type="hidden" name="profile-post" value="1" />
  <input type="text" name="firstName" placeholder="First Name" value="<?php echo $userProfile['firstName']; ?>"> <br>
  <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $userProfile['lastName']; ?>"><br>
  <input type="date" name="dob" value="<?php echo $userProfile['dob']; ?>"><br>
  <input type="text" name="addressFirst" placeholder="Address line 1" value="<?php echo $userProfile['addressFirst']; ?>"><br>
  <input type="text" name="addressSecond" placeholder="Address line 2" value="<?php echo $userProfile['addressSecond']; ?>"><br>
  <input type="text" name="city" placeholder="City" value="<?php echo $userProfile['city']; ?>"><br>
  <input type="text" name="postcode" placeholder="postcode" value="<?php echo $userProfile['postcode']; ?>"><br>
  <input type="text" name="mobile" placeholder="mobile" value="<?php echo $userProfile['mobile']; ?>"><br>
  <input type="text" name="bio" placeholder="Bio" value="<?php echo $userProfile['bio']; ?>"><br>
  <button type="submit" name="profile-submit">Add Profile</button>
</form>

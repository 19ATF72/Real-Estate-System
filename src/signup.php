<?php

require_once __DIR__ . '/system/core.php';

/**
* Sign up form template file.
*/

if (isset($_POST)) {
  if ($_POST['signup-post'] == 1) {
    // Assign and call signup user
    $result = $site->signupUser($_POST);

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
?>

<form action="" method="post">
  <input type="hidden" name="signup-post" value="1" />
  <input type="text" name="username" placeholder="Username">
  <input type="text" name="email" placeholder="Email">
  <input type="password" name="passwd" placeholder="Password">
  <input type="password" name="passwdtwo" placeholder="Repeat password">
  <button type="submit" name="signup-submit">Signup</button>
</form>
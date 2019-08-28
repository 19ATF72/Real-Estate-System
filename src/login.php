<?php

require_once __DIR__ . '/system/core.php';

/**
* Login form for user.
*/


if (isset($_POST)) {
  if ($_POST['login-post'] == 1) {
    // Assign and call login user
    $result = $site->loginUser($_POST);

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

<form action="" method="post">
  <input type="hidden" name="login-post" value="1" />
  <input type="text" name="emailusername" placeholder="Username / Email">
  <input type="password" name="passwd" placeholder="Password">
  <button type="submit" name="login">Login</button>
</form>
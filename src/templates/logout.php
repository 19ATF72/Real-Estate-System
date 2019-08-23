<?php
if (isset($_POST)) {
  if ($_POST['logout-post'] == 1) {
    // Logout user
    $site->logoutUser();
  }
}
?>

<form action="" method="post">
  <input type="hidden" name="logout-post" value="1" />
  <button type="submit" name="logout">Logout</button>
</form>
<?php
  /**
   * Real Estate System - Create new property for the current logged in user
   * @author Andrew De Torres <andrewdetorres999@gmail.com>
   */
  require_once __DIR__ . '/system/core.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>New Property | Real Estate System | Andrew De Torres</title>
    <?php require_once 'templates/header.php'; ?>
  </head>
  <body>
    <?php
    if ($user->isLoggedIn()) {

      $rows = $property->getPropertyTypes();

      if (isset($_POST)) {
        if ($_POST['newprop-post'] == 1) {

          // Create new property for the current logged in user.
          $result = $property->createNewProperty($_POST);

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
      <a href="index.php"><button name="profile">Home</button><a>
      <h3>Add Property</h3>
      <form action="" method="post">
        <input type="hidden" name="newprop-post" value="1" />
        <select name="propertyType">
          <?php
          foreach ($rows as $key => $value) {
            echo "<option value='{$value['id']}'>{$value['type']}</option>";
          }
          ?>
        </select><br>
        <input type="text" name="floorSpace" placeholder="Floor Space SqM"> <br>
        <input type="text" name="numBedrooms" placeholder="Number of Bedrooms"><br>
        <input type="text" name="numBathrooms" placeholder="Number of Bathrooms"><br>
        <input type="text" name="numGarages" placeholder="Number of Garages"><br>
        <input type="text" name="parking" placeholder="Parking"><br>
        <input type="text" name="numParking" placeholder="Number of Parking Spaces"><br>
        <input type="text" name="numBalconies" placeholder="Number of Balconies"><br>
        <input type="price" name="price" placeholder="Price"><br>
        <input type="text" name="description" placeholder="Property Description"><br>
        <button type="submit" name="profile-submit">Add Profile</button>
      </form>
      <?php
    }
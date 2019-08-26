<?php
  /**
   * Real Estate System - Single property page for user
   * @author Andrew De Torres <andrewdetorres999@gmail.com>
   */
  require_once __DIR__ . '/system/core.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Poperties | Real Estate System | Andrew De Torres</title>
    <?php require_once 'templates/header.php'; ?>
  </head>
  <body>
    <?php
      require_once 'templates/navigation.php';
      
      if ($user->isLoggedIn()) {
        // Get user ID based on property being viewed
        $userIsOwner = $property->getUserFromProperty($_GET['prop']);

        // Check logged in user is the owner of the property
        if($user->getId() == $userIsOwner['userId']) {

          $singleProperty = $property->getSingleProperty($_GET['prop']);
          // echo '<pre>' . var_export($singleProperty, true) . '</pre>';
          // exit();
          ?>
          <a href="my-properties.php"><button name="myprops">My Properties</button></a>
          <br>

          <p>Space: <?php echo $singleProperty['floorSpace']; ?></p>
          <p>Bedrooms: <?php echo $singleProperty['numBedrooms']; ?></p>
          <p>Bathrooms: <?php echo $singleProperty['numBathrooms']; ?></p>
          <p>Parking: <?php echo $singleProperty['parking']; ?></p>
          <p>Description: <?php echo $singleProperty['description']; ?></p>
          <p>Price: <?php echo $singleProperty['price']; ?></p>
          <br>
          <?php

          echo "Success";
        }
        else {
          echo "This is not your property.";
        }
      }
      else {
        echo "You are not logged in.";
      }


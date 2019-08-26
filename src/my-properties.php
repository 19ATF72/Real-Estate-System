<?php
  /**
   * Real Estate System - My properties page
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
        ?>
        <a href="index.php"><button name="home">Home</button></a>
        <?php

        if ($user->isLoggedIn()) {
          $userProperties = $property->getAllUsersProperty();
        }

        foreach($userProperties as $k => $values) {
          $propertyid = $values['id'];
          ?>
            <p>Space: <?php echo $values['floorSpace']; ?></p>
            <p>Bedrooms: <?php echo $values['numBedrooms']; ?></p>
            <p>Bathrooms: <?php echo $values['numBathrooms']; ?></p>
            <p>Parking: <?php echo $values['parking']; ?></p>
            <p>Description: <?php echo $values['description']; ?></p>
            <p>Price: <?php echo $values['price']; ?></p>
            <a href="user-property.php?prop=<?php echo $propertyid; ?>"><button name="myprops">View</button></a>
            <br>
          <?php
        }
      }
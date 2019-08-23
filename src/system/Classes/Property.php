<?php

/**
 * Profile - Carries out functions related to the users profile.
 */

// Take over profile functions from db
// Extend User

namespace RealEstate\Classes;
use PDO;

class Property {

  public function createNewProperty($data) {
    global $user, $db;
    $userID = $user->getId();

    $sql = 'INSERT INTO properties (userID, typeId, floorSpace, numBedrooms, numBathrooms, numGarages, parking, numParking, numBalconies, price, description)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([
        $userID,
        $data['propertyType'],
        $data['floorSpace'],
        $data['numBedrooms'],
        $data['numBathrooms'],
        $data['numGarages'],
        $data['parking'],
        $data['numParking'],
        $data['numBalconies'],
        $data['price'],
        $data['description']
      ]);
      header("Location: ../new-property.php");
      exit();
    }
  }

  /**
  * Get all properties
  *
  * @return void
  */
  public function getAllUsersProperty() {
    global $db;

    $userID = 1; //TODO
    $sql = 'SELECT * FROM properties WHERE userId = ?';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$userID]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
      return NULL;
    }
  }

  public function getPropertyTypes() {

    global $db;

    $sql = 'SELECT * FROM property_type';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
      return NULL;
    }
  }
}
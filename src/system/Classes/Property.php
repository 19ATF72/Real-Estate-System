<?php

namespace RealEstate\Classes;
use PDO;

/**
 * Profile - Carries out functions related to the users profile.
 */
class Property {

  /**
   * Create a new property
   *
   * @param post $data
   * @return void
   */
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
    
    global $user, $db;
    $userID = $user->getId();

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

  public function getSingleProperty($propertyId) {
    global $db;

    $sql = 'SELECT * FROM properties WHERE id = ?';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$propertyId]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    else {
      return NULL;
    }
  }
  /**
   * Get the property types available.
   *
   * @return void
   */
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
  
  /**
   * Get the user ID from the property ID.
   *
   * @param int $propertyId
   * @return void
   */
  public function getUserFromProperty($propertyId) {
    global $db;

    $sql = 'SELECT userId FROM `properties` WHERE id = ?';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$propertyId]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    else {
      return NULL;
    }
  }

  /**
   * Return the total number of active properties
   *
   * @return void
   */
  public function getUserPropertyCount() {
    global $user, $db;
    $userID = $user->getId();

    $sql = 'SELECT COUNT(*) FROM `properties` WHERE userId = ? AND status = 1';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$userID]);
      return $stmt->fetch(PDO::FETCH_COLUMN);
    }
    else {
      return NULL;
    }
  }

  /**
   * Return the total number of sold properties
   *
   * @return void
   */
  public function getUserSoldCount() {
    global $user, $db;
    $userID = $user->getId();

    $sql = 'SELECT COUNT(*) FROM `properties` WHERE userId = ? AND status != 1';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$userID]);
      return $stmt->fetch(PDO::FETCH_COLUMN);
    }
    else {
      return NULL;
    }
  }
}
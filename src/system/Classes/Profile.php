<?php

/**
 * Profile - Carries out functions related to the users profile.
 */

// Take over profile functions from db
// Extend User

namespace RealEstate\Classes;
use PDO;

class Profile {

  /**
   * Get the current users profile.
   *
   * @return array
   */
  public function getUserProfile() {
    global $user, $db;

    $userID = $user->getId();

    $sql = 'SELECT p.firstName, p.lastName, p.dob, p.addressFirst, p.addressSecond, p.city, p.postcode, p.mobile, p.bio
      FROM users AS u
      JOIN profiles AS p ON p.userId = u.id
      WHERE u.id = ?';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$userID]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }

  /**
   * Create or update a users profile.
   *
   * @param post $data
   * @return array
   */
  public function createUserProfile($data) {

    global $user, $db;

    $userID = $user->getId();

    $sql = 'SELECT COUNT(*)
      FROM users AS u
      JOIN profiles AS p ON p.userID = u.id
      WHERE u.id = ?';

    $stmt = $db->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$userID]);
      $result = $stmt->fetch(PDO::FETCH_COLUMN);

      if ($result) {
        $sql = 'UPDATE profiles
          SET firstName=?, lastName=?, dob=?, addressFirst=?, addressSecond=?, city=?, postcode=?, mobile=?, bio=?
          WHERE userID = ?';

        $stmt = $db->get()->prepare($sql);

        if ($stmt) {
          $stmt->execute([
            $data['firstName'],
            $data['lastName'],
            $data['dob'],
            $data['addressFirst'],
            $data['addressSecond'],
            $data['city'],
            $data['postcode'],
            $data['mobile'],
            $data['bio'],
            $userID
          ]);
          header("Location: ../profile.php?profile=updated");
          exit();
        }
      }
      else {
        $sql = 'INSERT INTO profiles (userID, firstName, lastName, dob, addressFirst, addressSecond, city, postcode, mobile, bio)
                VALUES (?,?,?,?,?,?,?,?,?,?)';

        $stmt = $db->get()->prepare($sql);

        if ($stmt) {
          $stmt->execute([
            $userID,
            $data['firstName'],
            $data['lastName'],
            $data['dob'],
            $data['addressFirst'],
            $data['addressSecond'],
            $data['city'],
            $data['postcode'],
            $data['mobile'],
            $data['bio']
          ]);
          header("Location: ../profile.php?profile=updated");
          exit();
        }
      }
    }
  }

}

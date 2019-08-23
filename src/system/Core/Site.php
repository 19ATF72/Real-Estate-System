<?php

namespace RealEstate\Core;

use RealEstate\Classes\Property;

/**
 * Used to handle and validation and logic.
 */
class Site {

  /**
   * Handle users sign up data and run signup query.
   *
   * @param POST $data
   * @return void
   */
  public function signupUser($data) {

    global $db;

    $username = $data['username'];
    $email = $data['email'];
    $passwd = $data['passwd'];
    $passwdtwo = $data['passwd'];

    if (empty($username) || empty($email) || empty($passwd) || empty($passwdtwo)) {
      return [ "status" => 403, "message" => 'fill in all signup fields.' ];
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9*$/]", $username))) {
      return [ "status" => 403, "message" => 'Invalid email or username. ' ];
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return [ "status" => 403, "message" => 'Invalid email or username. ' ];
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      return [ "status" => 403, "message" => 'username must be at least 6 characters.' ];
    }
    else if ($passwd !== $passwdtwo) {
      return [ "status" => 403, "message" => 'Passwords do not match' ];
    }
    else if (strlen($username) < 6) {
      return [ "status" => 403, "message" => 'Username must be at least 6 characters' ];
    }
    else if (strlen($passwd) < 8) {
      return [ "status" => 403, "message" => 'Password must be at least 8 characters.' ];
    }

    // If no errors are called, run signup user query.
    $db->signupUser($username, $email, $passwd);
  }

  /**
   * Handle post data and error check the users login credentials
   *
   * @param POST $data
   * @return void
   */
  public function loginUser($data) {

    global $db;

    $emailusername = $_POST['emailusername'];
    $passwd = $_POST['passwd'];

    // Error check
    if (empty($emailusername) || empty($passwd)) {
      return [ "status" => 403, "message" => 'Invalid credentials' ];
    }

     // If no errors are called, run the login user query
     $db->loginUser($emailusername, $passwd, FALSE);
  }

  /**
   * Log out the user from the current session and redirect to home page
   *
   * @return void
   */
  public function logoutUser() {
    session_destroy();
    header("Location: ../index.php");
    exit();
  }

  /**
   * Get all the properties.
   *
   * @return Object $objs
   */
  public function getAllProperty() {

    global $db;

    $properties = $db->getAllProperty();
    $objs = [];
    foreach ($properties as $property) {
      $objs[] = new Property($property);
    }
    return $objs;
  }

  /**
   * Return a single property based on property id.
   *
   * @return void
   */
  public function getSingleProperty() {
    global $db;

    return new Property(
      $db->getSingleProperty()
    );
  }
}
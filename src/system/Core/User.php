<?php

namespace RealEstate\Core;

/**
* Functionality relating to user
*/
class User {

  private $id;
  private $username;
  private $email;

  /**
  * Constructor
  *
  * @param array $data
  */
  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->username = $data['username'];
    $this->email = $data['email'];
  }

  /**
   * Check the user is logged in.
   *
   * @return boolean
   */
  public function isLoggedIn() {
    // Check if user session has been set
    if (isset($_SESSION) && isset($_SESSION['id']) && isset($_SESSION['username'])) {
      return true;
    }
  }

  /**
  * Get the current logged in users ID
  *
  * @return int
  */
  public function getId() {
    return $this->id;
  }

  /**
  * Get the current logged in users username
  *
  * @return string
  */
  public function getUsername() {
    return $this->username;
  }

  /**
  * Get the current logged in users email address
  *
  * @return string
  */
  public function getEmail() {
    return $this->email;
  }
}
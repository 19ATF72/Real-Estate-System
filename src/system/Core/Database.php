<?php
namespace RealEstate\Core;
use PDO;

/**
* All database functions reside in this class.
*/
class Database {

  protected   $link;
  private     $connected;
  private     $username;
  private     $password;
  private     $host;
  private     $tblname;

  /**
  * Constuctor for database
  *
  * @param MySQLi $conn
  */
  public function __construct(array $data)
  {
    // Store data
    $this->host = $data['host'];
    $this->username = $data['un'];
    $this->password = $data['pw'];
    $this->tblname = $data['name'];
    $this->connected = false;

    // Connect to database
    $this->connect();
  }

  /**
  * Create the connection
  *
  * @return void
  */
  private function connect() {
    try{
      $this->conn = new PDO('mysql:dbname='. $this->tblname . ';host=' . $this->host, $this->username,  $this->password);
      $this->connected = true;
    }
    catch(Exception $e) {
      die($e);
    }

    return $this->conn;
  }

  /**
  * Perform connection to the database.
  *
  * @return void
  */
  public function get() {
    if($this->connected) {
      return $this->conn;
    }
    else {
      return $this->connect();
    }
  }

  /**
   * Sign up the user for a new account
   *
   * @param string $username
   * @param string $email
   * @param string $passwd
   * @return void
   */
  public function signupUser($username, $email, $passwd) {

    // Return a bool if user already exists
    $sql = 'SELECT COUNT(*) FROM users WHERE username=?';

    $stmt = $this->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$username]);
      $result = $stmt->fetchColumn();

      if ($result) {
        // TODO: User already in DB
        echo "User in DB";
      }
      else {
        $sql = 'INSERT INTO users (username, email, passwd) VALUES (?,?,?)';
        $stmt = $this->get()->prepare($sql);
        $hashedpasswd = password_hash($passwd, PASSWORD_DEFAULT);
        $stmt->execute([$username, $email, $hashedpasswd]);
        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    }
  }

  /**
   * Log in the user and start a new session
   *
   * @param string $emailusername
   * @param string $passwd
   * @return void
   */
  public function loginUser($emailusername, $passwd, $hashed = false) {

    $sql = "SELECT * FROM users WHERE username=? OR email=?";
    $stmt = $this->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$emailusername, $emailusername]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $passCheck = password_verify($passwd, $result['passwd']);

      // Error check against password in the database
      if ($passCheck == false) {
        return [ "status" => 403, "message" => 'Invalid credentiabels' ];
      }
      else if ($passCheck == true) {

        // Create session
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['email'] = $result['email'];

        // Force a refresh on login.
        header('Location: index.php');
        exit();
      }
    }
  }

  public function createNewProperty($data) {

    global $user;
    $userID = $user->getId();

    $sql = 'INSERT INTO properties (userID, typeId, floorSpace, numBedrooms, numBathrooms, numGarages, parking, numParking, numBalconies, price, description)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)';

    $stmt = $this->get()->prepare($sql);

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

    $userID = 1; //TODO
    $sql = 'SELECT * FROM properties WHERE userId = ?';

    $stmt = $this->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute([$userID]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
      return NULL;
    }
  }

  public function getPropertyTypes() {
    $sql = 'SELECT * FROM property_type';

    $stmt = $this->get()->prepare($sql);

    if ($stmt) {
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
      return NULL;
    }
  }
}
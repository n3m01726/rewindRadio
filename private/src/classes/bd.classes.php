<?php 
namespace RewindRadio;
use \PDO;
use \PDOException;

class DBConnect {
  
// Connection variables
  private $host = DBHOST;
  private $username = DBUSER;
  private $password = DBPASSWORD;
  private $database = DBNAME;

  // Connection object
  private ?\PDO $conn = null;

  // Connect to database
  public function connect() {
    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
    return $this->conn;
  }

  public static function is_logged_in(){
    if(isset($_SESSION['logged_in'])){
        return true;
    } else {
        return false;
    }
}
}

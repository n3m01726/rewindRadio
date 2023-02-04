<?php
/*  How to use classes 
    RewindRadio\Class::functionName();
*/

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

Class Layout {

  public static function the_setup_header() {
    //  define('LANG','fr');
      echo '<!doctype html>
  <html lang="'. LANG .'">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Plugins CSS Styles Sheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
'; 
    } /*close the_header function */
    
  public static function the_setup_footer() {
      echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
';
  } /* close footer function */
 }
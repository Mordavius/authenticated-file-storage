<?php
/*
* database connection that will be used for all the classes that need database access 
* borrowed heavily from the internet
*/
require $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createMutable($_SERVER["DOCUMENT_ROOT"]);
$dotenv->load();

class Database
{
  private $connection;
  private static $_instance;

  public static function getInstance()
  {
    if (!self::$_instance) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  // Constructor
  private function __construct()
  {
    try {
      $this->connection = new PDO('mysql:host=' . $_ENV["DB_HOST"] . ';dbname=' . $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);

      // Error handling
    } catch (PDOException $e) {
      die("Failed to connect to DB: " . $e->getMessage());
    }
  }

  // Magic method clone is empty to prevent duplication of connection
  private function __clone()
  {
  }

  // Get the connection	
  public function getConnection()
  {
    return $this->connection;
  }
}

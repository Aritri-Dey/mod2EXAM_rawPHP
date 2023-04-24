<?php 

 /**
  * Class to create connection using php data objects (PDO).
  */
  class Connect {

    /**
     * Function to create connection with databse and return connection object.
     * 
     *  @return $conn
     *    Returns the connection object.
     */
    public function returnConn() {
      require "databaseInfo.php";
      $servername = $_ENV['SERVER'];
      $username = $_ENV['USERNAME'];
      $password = $_ENV['PASSWORD'];
      $dbname = $_ENV['DBNAME'];
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // Set the PDO error mode to exception.
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    }
  }
?>

<?php 
/**
 * This class handles all database related queries i.e., if user wants to add /
 * remove / update anything related to player or user's profile.
 */
class DbMethods 
{
  /**
   *  @var object $conn
   *    Stores database connection object.
   */
  private $conn;

  /**
   * Constructor to call Connect class and create connection object.
   */
  public function __construct() {
    include "connect.php";
    // Creating object of Connection class and storing conection object in $conn.
    $connObj = new Connect();
    $this->conn = $connObj->returnConn();
  }

  /**
   * Function to select data from from desired table.
   * 
   *  @param string $table
   *    Stores table name from where data is to be selected.
   * 
   *  @return object
   *    Returns prepared sql query.
   */
  public function selectData(string $table) {
    return $this->conn->prepare("SELECT * from $table");
  }

  /**
   * Function to verify data filled in login form with data in UserInfo table.
   * 
   *  @param array $arr
   *    Stores user information in associative array.
   * 
   *  @return object 
   *    Returns prepared sql query.
   */
  public function checkLoginData(array $arr) {
    return $this->conn->prepare("SELECT username FROM userTable WHERE username = '$arr[userName]'  AND password = '$arr[password]' AND email='$arr[email]'");
  }

  /**
   * Function to insert player data in database and return all records from player table.
   * 
   *  @return object 
   *    Returns prepared sql query.
   */
  public function insertPlayer() {
    $name = $_POST['playerName'];
    $runs = $_POST['runs'];
    $balls = $_POST['balls'];
    // Calculating strike rate of player.
    $strikeRate = ($runs/$balls)*100;
    $statement = $this->conn->prepare("INSERT INTO player (name, runs, balls, strikeRate)
    VALUES (:name, :runs, :balls, :strikeRate)");
    $statement->bindParam(':name', $name);
    $statement->bindParam(':runs', $runs);
    $statement->bindParam(':balls', $balls);
    $statement->bindParam(':strikeRate', $strikeRate);
    $statement->execute();
    // Returning data of player table to display.
    return $this->selectData("player");
  }

  /**
   * Function to return player with best strike rate.
   * 
   *  @return object
   *    Returns prepared sql query.
   */
  public function showBestPlayer() {
    return $this->conn->prepare("SELECT name, MAX(strikeRate) FROM player GROUP BY name");
  }

  /**
   * Function to update player data.
   * 
   *  @param array $arr
   *    Stores information to be updated in associative array.
   *  @param int $id
   *    Stores id of player to be updated.
   */
  public function updatePlayer(array $arr, int $id) {
    $statement = $this->conn->prepare("UPDATE player SET name='$arr[name]', runs='$arr[runs]', balls='$arr[balls]' WHERE id='$id;");
    $statement->execute();
  }

  /**
   * Function to delete a player.
   * 
   *  @param int $id
   *    Stores id of player to be deleted.
   */
  public function deletePlayer(int $id) {
    $statement = $this->conn->prepare("DELETE from player WHERE id='$id'");
    $statement->execute();
  }

  /**
   * Function to insert form data into UserInfo table.
   * 
   *   @param array $arr
   *      Stores information to be updated in associative array.
   */
  public function registerUser(array $arr) {
    $statement = $this->conn->prepare("INSERT INTO userTable (username, email, password)
    VALUES (:username, :email, :email, :password)");
    $statement->bindParam(':username', $arr['userName']);
    $statement->bindParam(':email', $arr['email']);
    $statement->bindParam(':password', $arr['password']);
    $statement->execute();
  }
}

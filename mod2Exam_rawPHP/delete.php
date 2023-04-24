<?php 
session_start();
try {
  include "class/DbMethods.php";
  $obj = new DbMethods();
  // Calling function to delete a player from the player table with the particular id.
  $obj->deletePlayer($_POST['id']);
  echo "Record Deleted";
}
catch(PDOException $e)  {
  echo "Error: " . $e->getMessage();
}
?>

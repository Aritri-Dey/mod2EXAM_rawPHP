<?php 
session_start();
if (isset($_POST['editBtn'])) {
  $id = $_GET['id'];
  include "class/DbMethods.php";
  $obj = new DbMethods();
  $arr = [
    "name" => $_POST['newName'],
    "runs" => $_POST['newruns'],
    "balls" => $_POST['newballs']
  ];
  // Function call to update player data in database.
  $obj->updatePlayer($arr, $id);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <?php include 'header/header.php' ?>
  </head>
  <body>
    <form method="post" name="editForm">
      <div> 
        <label>Player Name</label>
        <input type="text" name="newName" id="newName">
        <span id="err"></span>
      </div>
      <div>
        <label>Runs</label>
        <input type="number" name="newruns" id="newruns">
      </div>
      <div>
        <label>Balls</label>
        <input type="number" name="newballs" id="newballs">
      </div>
      <input type="submit" value="Submit" name="editBtn">
    </form>
  </body>
</html>

<?php 
session_start();
try {
  include "class/DbMethods.php";
  $obj = new DbMethods();
  $playerData = $obj->selectData("player");
  $playerdata->execute();
  // Checking if already 11 records have been inserted.
  if ($playerdata->rowCount() < 11) {
    // If number of records in player table has not exceeded 11, only then records
    // can be inserted.
    $statement = $obj->insertPlayer();
    $statement->execute();
    // Set the resulting array to associative.
    $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
    $output= "";
    if ($statement->fetchColumn() > 0) {
      $output = '
      <table>
      ';
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $output .=
        "<tr>
        <td>{$row["name"]}</td>
        <td>{$row["runs"]}</td>
        <td>{$row["balls"]}</td>
        <td>{$row["strikeRate"]}</td>
        <td><button  href='edit.php?id={$row["playerId"]}'>Edit Player</button></td>
        <td><button onclick='deletePLayer({$row["playerId"]})'>Delete Player</button></td>
        </tr>";
      }
      $output.= "</table>
      <div id='response'></div>";
      echo $output;
    }
    else {
      echo "No more record";
    }
  }
  else {
    echo "Cannot insert anymore records.";
  }
}
catch(PDOException $e)  {
  echo "Error: " . $e->getMessage();
}
?>

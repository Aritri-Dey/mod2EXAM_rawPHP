<?php 
session_start();
try {
  include "class/DbMethods.php";
  $obj = new DbMethods();
  // Function call to show player with highest strike rate from player table.
  $statement = $obj->showBestPlayer();
  $statement->execute();
  if ($statement->fetchColumn() > 0) {
    $output = '<table>';
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $output .=
      "<tr>
        <td>{$row["name"]}</td>
        <td>{$row["strikeRate"]}</td>
      </tr>";
    }
    $output.= "</table>";
    echo $output;
  }
}
catch(PDOException $e)  {
  echo "Error: " . $e->getMessage();
}
?>

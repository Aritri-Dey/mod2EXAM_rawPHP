<?php 
session_start();
try {
  include "class/DbMethods.php";
  $obj = new DbMethods();
  // Selecting data from player table to show to anonymous user.
  $statement = $obj->selectData("player");
  $statement->execute();
}
catch(PDOException $e)  {
  echo "Error: " . $e->getMessage();
}
?>

<!--Landing page of the application-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <?php include 'header/header.php' ?>
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <div class="player-div">
      <table>
        <tr>
          <th>Player</th>
          <th>Runs</th>
          <th>Balls</th>
          <th>Strike rate</th>
        </tr>
        <?php 
          if ($statement->rowCount() > 0) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['runs']?></td>
          <td><?php echo $row['balls']?></td>
          <td><?php echo $row['strikerate']?></td>
        </tr>
        <?php }
          }
        else {?>
          <div class="eachItem">No players to show.</div>
        <?php } ?>
      </table>
      <?php if (!$_SESSION['logged']) { ?>
        <button onclick="manOfTheMatch()">Show Man of the match</button>
        <div id="manofthematch"></div>
      <?php }?>
    </div>
  </div>
</body>
</html>

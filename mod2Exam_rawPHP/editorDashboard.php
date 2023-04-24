<!--Dashboard to update player informatin which can be accessed on login-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include 'header/header.php' ?>
  </head>
  <body>
    <form method="post" name="addPlayerForm">
      <div>
        <label>Player Name</label>
        <input type="text" name="playerName" id="playerName">
        <span id="err"></span>
      </div>
      <div>
        <label>Runs</label>
        <input type="number" name="runs" id="runs">
      </div>
      <div>
        <label>Balls</label>
        <input type="number" name="balls" id="balls">
      </div>
      <input type="submit" name="submitLogin" id="submitLogin" value="Submit" class="buttons" onclick="return insertPlayer()">
      <span id="err"></span>
    </form>
    <div id="response"></div>
  </body>
</html>

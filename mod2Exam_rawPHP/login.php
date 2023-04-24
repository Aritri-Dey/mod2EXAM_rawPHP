<?php 
session_start();
try {
  if(isset($_POST['submitLogin'])) {
    // Calling class to verify login form information. 
    include "class/DbMethods.php";
    $obj = new DbMethods();
    $arr = ["userName" => $_POST['userNameLogin'], "email" => $_POST['emailLogin'], "password" => $_POST['passwordLogin']];
    $stmt = $obj->checkLoginData($arr);
    $stmt->execute();
    if($stmt->rowCount()) {
      $_SESSION['logged'] = TRUE;
      $row = $stmt1->fetch(PDO::FETCH_ASSOC);
      header("Location: editorDashboard.php");
    }
    else {
      $_SESSION['loginErr'] = 'Unable to login';
      header("Location: login.php");
    }
  }
}
catch(PDOException $e)  {
  echo "Error: " . $e->getMessage();
}
?>
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
    <form method="post" name="loginForm">
      <div>
        <label>Username</label>
        <input type="text" name="userNameLogin" id="userNameLogin">
        <span id="err"></span>
      </div>
      <div>
        <label>Email</label>
        <input type="email" name="emailLogin" id="emailLogin">
        <span id="err"></span>
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="passwordLogin" id="passwordLogin">
        <span id="err"></span>
      </div>
      <input type="submit" name="submitLogin" id="submitLogin" value="Submit" class="buttons" onclick="return checkValid()">
      <a href="register.php">Want to join as content editor?</a>
    </form>
    <span id="err"></span>
    <span><?php echo isset($_SESSION['loginErr'])? "*" . $_SESSION['loginErr']: ""; ?> </span>
  </body>
</html>

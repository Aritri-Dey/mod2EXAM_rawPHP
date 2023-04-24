<?php 
session_start();
try {
  if (isset($_POST['submitReg'])) {
    include "class/Validation.php";
    // Validation class is called to check for form field validation.
    $valObj = new Validation();
    if (!$valObj->checkEmpty($_POST['userName']) || $valObj->validateName($_POST['userName'])) {
      $_SESSION['regErr'] = "Enter proper username";
      header("Location: register.php");
    }
    else if (!$valObj->checkEmpty($_POST['email']) || $valObj->checkMail($_POST['email'])){
      $_SESSION['regErr'] = "Enter valid email id";
      header("Location: register.php");
    }
    else if (!$valObj->checkEmpty($_POST['password'])){
      $_SESSION['regErr'] = "Enter password";
      header("Location: register.php");
    }
    // If all fields are validated only then data will be inserted into database.
    else {
      include "class/DbMethods.php";
      $obj = new DbMethods();
      $arr = ["userName" => $_POST['userName'], "email" => $_POST['email'], "password" => $_POST['password']];
      $obj->registerUser($arr);
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
    <title>Register</title>
    <?php include 'header/header.php' ?>
  </head>
  <body>
    <form method="post" name="registerForm">
      <div>
        <label>Username</label>
        <input type="text" name="userName" id="userName">
      </div>
      <div>
        <label>Email</label>
        <input type="email" name="email" id="email">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" id="password">
      </div>
      <div>
        <label>Confirm Password</label>
        <input type="password" name="conPassword" id="conPassword">
      </div>
      <input type="submit" name="submitReg" id="submitReg" value="Submit" class="buttons" onclick="return checkRegister()">
      <span id="err"></span>
      <span><?php echo isset($_SESSION['regErr'])? "*" . $_SESSION['regErr']: ""; ?> </span>
    </form>
  </body>
</html>

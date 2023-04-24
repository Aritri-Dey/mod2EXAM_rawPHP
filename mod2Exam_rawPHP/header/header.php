<link rel="stylesheet" href="css/style.css">
<div class="header-wrapper">
  <nav class="header container">
    <div class="header-right">
        <div>
          <button href="login.php">Login</button>
        </div>
      <?php if (isset($_SESSION['logged']) && $_SESSION['logged']) {?>
        <div>
          <a href="logout.php" class="buttons">Logout</a>
        </div>
      <?php } ?>
    </div>
  </nav>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="./js/forms.js"></script>
<script src="./js/validation.js"></script>

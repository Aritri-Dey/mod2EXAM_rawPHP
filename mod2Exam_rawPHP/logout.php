<?php 
session_start();
$_SESSION['logged'] = FALSE;
session_unset();
session_destroy();
header("Location: index.php");
?>

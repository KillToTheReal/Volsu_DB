<?php 
session_start();
unset($_SESSION['logged']);
unset($_SESSION['usermail']);
unset($_SESSION['admin']);
header("Location: ../index.php" );
?>
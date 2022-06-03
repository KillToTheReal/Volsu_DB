<?php
require_once "./database.php";
session_start();
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$adm = 0;
$hash = hash('md5', $pass);
$qry = mysqli_query($mysql, "CALL register_new_user('$mail','$hash','$adm')");
 if(mysqli_fetch_assoc($qry) == 'Success'){
     $_SESSION['logged'] = true;
     $_SESSION['usermail'] = $mail;
     header('Location: ../index.php');
 } else {
     $_SESSION['errors_log'] = 'You cant have access';
     header('Location: ../index.php?');
 }
?>
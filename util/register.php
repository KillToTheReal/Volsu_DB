<?php
require_once "./database.php";
session_start();
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$adm = 0;
$hash = hash('md5', $pass);
$qry = mysqli_query($mysql, "CALL register_new_user('$mail','$hash','$adm')");
print_r(mysqli_fetch_assoc($qry));
    // $_SESSION['logged'] = true;
    // $_SESSION['usermail'] = $mail;
    // header('Location: ../index.php');

?>
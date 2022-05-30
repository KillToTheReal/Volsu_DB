<?php
require_once "./database.php";
session_start();
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$toparse = mysqli_query($mysql, "SELECT user_email FROM users where user_email = '$mail' ");
$parsed = mysqli_fetch_row($toparse);
if($parsed){
    
    header('Location: ../index.php?error=user_exists');
    die();
} else {
    
    $hash = hash('md5', $pass);
    mysqli_query($mysql, "INSERT INTO users (user_email, pass) VALUES ('$mail','$hash')");
    $_SESSION['logged'] = true;
    $_SESSION['usermail'] = $mail;
    header('Location: ../index.php');
}
?>
<?php
require_once "../../util/database.php";
session_start();
$mail = $_POST['name_2'];
$pass = $_POST['name_3'];
$toparse = mysqli_query($mysql, "SELECT user_email FROM users where user_email = '$mail' ");
$parsed = mysqli_fetch_row($toparse);
if($parsed){
    
    header('Location: ../users.php?error=user_exists');
    die();
} else {
    
    $hash = hash('md5', $pass);
    mysqli_query($mysql, "INSERT INTO users (user_email, pass) VALUES ('$mail','$hash')");
    $_SESSION['logged'] = true;
    $_SESSION['usermail'] = $mail;
    header('Location: ../users.php');
}
?>
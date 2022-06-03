<?php
require_once "./database.php";
session_start();
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$toparse = mysqli_query($mysql, "SELECT user_email, pass FROM users where user_email = '$mail' ");
$hash = hash('md5', $pass);
$parsed = mysqli_fetch_row($toparse);
if (isset($parsed[0])) {
    if ($parsed[0] == $mail && $parsed[1] == $hash) {
        if ($mail == "admin@mail.ru") {
            $_SESSION['admin'] = true;
        }
        $_SESSION['logged'] = true;
        $_SESSION['usermail'] = $mail;
        header('Location: ../index.php');
    }
} else {
    $_SESSION['errors_log'] = "User doesnt exists or your password is incorrect\n";
    header('Location: ../index.php');
}

<?php 
require_once "../../util/database.php";
print_r($_POST);
$id = $_POST['item0'];
$pass = $_POST['item2'];
$mail = $_POST['item1'];

mysqli_query($mysql,"UPDATE users SET user_email = '$mail', pass='$pass' WHERE user_id='$id' ");
header('Location: ../users.php');
?>
<?php
require_once "../../util/database.php";

$name = $_POST['name_2'];
$amount  = $_POST['name_3'];
$price = $_POST['name_4'];

mysqli_query($mysql,"INSERT INTO storage(item_name, amount, current_price) VALUES ('$name', '$amount','$price') ");

header('Location: ../storage.php');
?>
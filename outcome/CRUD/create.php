<?php
require_once "../../util/database.php";

$item_id = $_POST['name_2'];
$amount  = $_POST['name_3'];
$client_id  = $_POST['name_4'];
$price  = $_POST['name_5'];
$date = $_POST['name_6'];

mysqli_query($mysql,"INSERT INTO outcome(item_id, amount, client_id, price_out, date_out) VALUES
 ('$item_id', '$amount','$client_id','$price','$date')");

header('Location: ../outcome.php');
?>
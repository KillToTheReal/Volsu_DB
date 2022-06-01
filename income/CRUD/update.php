<?php 
require_once "../../util/database.php";
$id = $_POST['item0'];
$item_id = $_POST['item1'];
$amount = $_POST['item2'];
$client_id = $_POST['item3'];
$price = $_POST['item4'];
$date = $_POST['item5'];
mysqli_query($mysql,"UPDATE outcome SET item_id = '$item_id', amount = '$amount', client_id = '$client_id', price_out='$price', date_out='$date' WHERE check_id='$id' ");
header('Location: ../outcome.php');
?>
<?php 
require_once "../../util/database.php";
$id = $_POST['item0'];
$item_id = $_POST['item1'];
$amount = $_POST['item2'];
$client_id = $_POST['item3'];
$date = $_POST['item4'];
$price = $_POST['item5'];

mysqli_query($mysql,"UPDATE income SET item_id = '$item_id', amount = '$amount', supplier_id = '$client_id', date_sup='$date',price_sup='$price' WHERE invoice_id='$id' ");
header('Location: ../income.php');
?>
<?php
require_once "../../util/database.php";

$item_id = $_POST['name_2'];
$amount  = $_POST['name_3'];
$supplier_id  = $_POST['name_4'];
$date = $_POST['name_5'];
$price  = $_POST['name_6'];

mysqli_query($mysql,"INSERT INTO income(item_id, amount, supplier_id, date_sup, price_sup) VALUES
 ('$item_id', '$amount','$supplier_id','$date','$price')");

header('Location: ../income.php');
?>
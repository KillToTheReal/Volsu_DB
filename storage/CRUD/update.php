<?php 
require_once "../../util/database.php";
print_r($_POST);
$id = $_POST['item0'];
$name = $_POST['item1'];
$amount = $_POST['item2'];
$price = $_POST['item3'];

mysqli_query($mysql,"UPDATE storage SET item_name = '$name', amount = '$amount', current_price = '$price' WHERE item_id='$id'");
header('Location: ../storage.php');
?>
<?php 
require_once "../../util/database.php";
print_r($_POST);
$id = $_POST['item0'];
$name = $_POST['item1'];
$mail = $_POST['item2'];

mysqli_query($mysql,"UPDATE suppliers SET suppliername = '$name', suppliermail = '$mail' WHERE idsuppliers='$id'");
header('Location: ../suppliers.php');
?>
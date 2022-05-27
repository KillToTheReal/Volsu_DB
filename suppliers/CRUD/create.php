<?php
require_once "../../util/database.php";

$name = $_POST['name_2'];
$email  = $_POST['name_3'];

mysqli_query($mysql,"INSERT INTO suppliers(suppliername, suppliermail) VALUES ('$name', '$email') ");

header('Location: ../suppliers.php');
?>
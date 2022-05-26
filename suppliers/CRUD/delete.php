<?php 
require_once "../../util/database.php";
$myid = $_GET["id"];
mysqli_query($mysql,"DELETE from suppliers WHERE suppliers.supplier_id ='$myid'");
header('Location: ../suppliers.php');

?>
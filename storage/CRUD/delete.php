<?php 
require_once "../../util/database.php";
$myid = $_GET["id"];
mysqli_query($mysql,"DELETE from storage WHERE storage.item_id ='$myid'");
header('Location: ../storage.php');

?>
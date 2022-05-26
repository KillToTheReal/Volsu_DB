<?php 
require_once "../../util/database.php";
$myid = $_GET["id"];
mysqli_query($mysql,"DELETE from clients WHERE clients.client_id ='$myid'");
header('Location: ../clients.php');

?>
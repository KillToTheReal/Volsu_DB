<?php 
require_once "../../util/database.php";
$myid = $_GET["id"];
mysqli_query($mysql,"DELETE from income WHERE income.invoice_id ='$myid'");
header('Location: ../income.php');

?>
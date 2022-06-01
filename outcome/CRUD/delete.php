<?php 
require_once "../../util/database.php";
$myid = $_GET["id"];
mysqli_query($mysql,"DELETE from outcome WHERE outcome.check_id ='$myid'");
header('Location: ../outcome.php');

?>
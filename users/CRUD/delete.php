<?php 
require_once "../../util/database.php";
$myid = $_GET["id"];
mysqli_query($mysql,"DELETE from users WHERE users.user_id ='$myid'");
header('Location: ../users.php');

?>
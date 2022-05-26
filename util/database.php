<?php

$mysql = new mysqli('127.0.0.1' , 'root' , 'my-secret-pw' , 'mydb');

if ($mysql->connect_errno) {
    echo("Соединение не удалось: %s\n");
    echo( $mysql->connect_error);
    exit();
}
try {
$db = new pdo('mysql:host=127.0.0.1; dbname=mydb', 'root' , 'my-secret-pw' );
    } catch(PDOException $err) {
        die('Connection Error :' . $err->getMessage() );
    }

?>

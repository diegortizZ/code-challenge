<?php

$server_db = "localhost";
$data_base = "mysql";
$user = "root";
$password = "root";

try {

    $conection = new mysqli('mysql_db', $user, $password,'challenge');
    
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
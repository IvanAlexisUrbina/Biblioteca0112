<?php

if ($_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '::1') {
    // Entorno local (localhost)
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mvc";
} else {
    // Entorno de producción (servidor remoto)
    $host = "localhost";
    $username = "u638789243_bugivan19";
    $password = "Bugivan19+";
    $dbname = "u638789243_biblioteca";
}

$port = "3306";
$charset = "utf8mb4"; 

// Resto de tu código de conexión a la base de datos...
?>
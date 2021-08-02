<?php

$dsn = 'mysql:host=localhost;dbname=ecom'; // Data source name
$user = 'root'; // Database user
$pass = ''; // Database password
$options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

try {
    $db = new PDO ($dsn, $user, $pass, $options); // Start a new connection with PDO class
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'You\'re connected';
} catch(PDOException $e) {
    echo 'Failed connection due to ' . $e->getMessage();
}
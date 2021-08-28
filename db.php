<?php

$connection = null;
$dsn = 'mysql://hostname=localhost;dbname=php_pdo';
$user = 'root2';
$pass = '123';
$options = [
    // command to be executed in every MySQL query to enable the inserting of arabic data without any errors
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
try {
    $connection = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Sorry you got this error: ' . $e->getMessage();
}
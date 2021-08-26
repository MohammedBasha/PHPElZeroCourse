<?php

/* 
 * To deal with Database with an OOP Interface you can use one of these drivers:
 * 1- mysqli
 * 2- PDO
 * - https://www.php.net/manual/en/book.pdo.php
 * 
 * - to know the loaded modules in php via Command line:
 * > php -m
 * - or using the function get_loaded_extensions()
 * 
 * - The returning data from the Database are (Resource) compound (complex) data type.
 * 
 * - To start using the database:
 * 1- Establish a connection to your db server.
 * 2- Select your db.
 * 3- Manipulate your db tables.
 * 4- Close your connection.
 * 
 */


//echo '<pre>';
//var_dump(get_loaded_extensions());
//echo '</pre>';

// $dsn = data source name >> mysql://hostname=localhost;dbname=php_pdo

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

//echo '<pre>';

// PDO::exec() returning the number of rows affected by the statement && used with insert, update, and delete statements
//var_dump($connection->exec('select * from employees'));

// PDO::query() returning the result set (if any) returned by the statement as a PDOStatement object
//var_dump($connection->query('select * from employees'));

//echo '</pre>';

$name = 'Osama';
if ($connection->exec('insert into employees set name = "' . $name . '"')) {
    echo 'New emloyee ' . $name . 'has been inserted successfully';
}
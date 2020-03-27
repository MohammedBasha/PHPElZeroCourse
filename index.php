<?php

	$dsn = 'mysql:host=localhost;dbname=ecom2'; // Data Source Name
	$user = 'root'; // Database Username
	$pass = ''; // Database Password
	$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);


	try { // Try to connect to the database
		$db = new PDO($dsn, $user, $pass, $options); // Connect to the Database with the PDO Class
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$q = "INSERT INTO items (name) VALUES ('منتج 5')";
		$db->exec($q);

	} catch(PDOException $e) { // catch any errors while connecting
		echo 'Connection Failed >>> ' . $e->getMessage();
	}


<?php

	$dsn = 'mysql:host=localhost;dbname=ecom2'; // Data Source Name
	$user = 'root'; // Database Username
	$pass = ''; // Database Password


	try { // Try to connect to the database
		$db = new PDO($dsn, $user, $pass); // Connect to the Database with the PDO Class
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo 'You are Connected';

	} catch(PDOException $e) { // catch any errors while connecting
		echo 'Connection Failed >>> ' . $e->getMessage();
	}


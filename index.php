<?php

// dirname(__FILE__) => getting the directory path that holds the index.php file + then store a full pathe of the text file in $file.

$file = dirname(__FILE__) . '\m!b.txt';

// Checks if the $file exists then print a success message

if(file_exists($file)):
	echo 'The file [' . basename($file) . '] exists';
else:

	// If not exists print a fail message and create the file with content.

	echo 'The file [' . basename($file) . '] not exists, but It\'s created by PHP';
	file_put_contents($file, 'Created by PHP');
	
endif;
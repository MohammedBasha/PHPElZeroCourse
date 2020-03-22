<?php

// dirname(__FILE__) => getting the directory path that holds the index.php file + then store a full pathe of the text file in $file.

$file = dirname(__FILE__) . '\mb.txt';

// Checks if the $file is writable then print a success message and write to it.

// if(is_writeable($file)):
if(is_writable($file)):
	echo 'The file [' . basename($file) . '] writable';
	file_put_contents($file, 'Writable by PHP');
else:

	// If It's not writable print a fail message.
	echo 'The file [' . basename($file) . '] not writable';
endif;
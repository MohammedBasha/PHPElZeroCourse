<?php

/*==========================================================
	[ Learn PHP 5 In Arabic ] #92
===========================================================*/

function fileExist() {
	if (file_exists('filea.txt')) {
		echo 'The file is found';
	} else {
		sleep(2); // for int seconds

		// usleep(2500000); // for a fraction of a second (2.5s)

		fileExist();
	}
}

fileExist();

?>

<?php

/*==========================================================
	[ Learn PHP 5 In Arabic ] #87 - #91
===========================================================*/
?>
<!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Simple Login with Session</title>
	</head>
	<body>
		<form action="chk.php" method="POST">
			<input type="text" name="username">
			<input type="submit" value="Login">
		</form>
	</body>
<html> -->

<?php
/*==========================================================
	[ Learn PHP 5 In Arabic ] #84 - #86
===========================================================*/

/* 
	setcookie ($name, $value, $expires, $path, $domain, $secure, $httponly)
*/

// setcookie('customCookie', 'Custom Test for cookie', time() + 3600, '/contact', 'domain.com', TRUE, TRUE);

// To unset a cookie
// setcookie('BackgroundColor', '', time() - 3600, '/');

// $mainColor = '#fff';

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	$mainColor = $_POST['color'];

// 	setcookie('BackgroundColor', $mainColor, time() + 3600, '/');
// }

// if (isset($_COOKIE['BackgroundColor'])) {
// 	$body = $_COOKIE['BackgroundColor'];
// } else {
// 	$body = $mainColor;
// }

?>
<!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Modify and delete cookies</title>
	</head>
	<body style="background-color: <?php //echo $body; ?>">
		<form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="color" name="color">
			<input type="submit" value="Choose">
		</form>
	</body>
</html> -->


<?php
/*==========================================================
	[ Learn PHP 5 In Arabic ] #72 - File System - Unlink, RmDir + Examples

	https://www.youtube.com/watch?v=ZvSNabWhYIA&list=PLDoPjvoNmBAzH72MTPuAAaYfReraNlQgM
===========================================================*/

// unlink('file.txt'); // Delete the file if had writable permission

/*==========================================================
	[ Learn PHP 5 In Arabic ] #71 - File System - Pathinfo
===========================================================*/

// $pathInfo = pathinfo(__FILE__);

// echo '<pre>';
// foreach($pathInfo as $infoName => $infoData) {
// 	echo $infoName . ' is => ' . $infoData . '<br>';
// }
// echo '</pre>';

/*===========================================================*/
// copy('oldfile', 'newfile');
// rename('oldname', 'newname');

/*==========================================================
	[ Learn PHP 5 In Arabic ] #69 - File System - File Get Contents

	https://www.php.net/manual/en/function.file-get-contents.php
===========================================================*/

// echo file_get_contents('http://mohammedbasha.com/farmacia/', false, NULL, 0, 5);

/*==========================================================
	[ Learn PHP 5 In Arabic ] #68 - File System - File Put Contents

	https://www.php.net/manual/en/function.file-put-contents.php
===========================================================*/

// file_put_contents('file.txt', '\n The New Data', FILE_APPEND); // Append the new data to the old data

// file_put_contents('file.txt', '\n The New Data', LOCK_EX); // Remove the old data and add the new data


/*===========================================================
[ Learn PHP 5 In Arabic ] #67 - File System - Simple Training 1
An important lesson to learn the file system

// Understanding UNIX permissions and file types
// https://unix.stackexchange.com/questions/183994/understanding-unix-permissions-and-file-types

===========================================================*/

// $directory = 'newDirectory';

// Checking if directory exists
// if (is_dir($directory)) {
// 	echo 'Sorry, The Directory named [ ' . $directory . ' ] found, no need to create it. I\'ll just delete it';

// Removing directory
// 	rmdir($directory);

// } else {

// Creating directory
// 	mkdir($directory);

// 	echo 'The Directory named [ ' . $directory . ' ] has been created';
// }

/*===========================================================*/

// checking if the file path without sufix or not
// if (basename(__FILE__, '.php') === 'index') {
// 	echo 'Your file is ready';
// }

/*===========================================================*/

// getting the directory I'm in
// $file = dirname(__FILE__) . '\file.txt';

// up for two steps in PHP 7.x
// $file = dirname(__FILE__, 2);

// dirname(__FILE__) === __DIR__

// chmod($file, 0444); // Changing mode to be 'Read only'
// chmod($file, 0755); // Changing mode to be 'Reading, writing and execution for the owner'

/*==========================================================
	[ Learn PHP 5 In Arabic ] #64 - File System - File_Exists, Is_Writable
===========================================================*/

// // Chcking if the file wrtiable or not
// if (is_writable($file)) {
// 	echo 'The File [ '. $file . ' ] is Writeable and you cand write into it';

// 	// Writing a content in the file if found
// 	file_put_contents($file, "Added this content with file_put_content() function");
// } else {
// 	echo 'Sorry, the File [ '. $file . ' ] is not writable, check your permissions';

// 	// Creating the file and writing a content into it
// 	file_put_contents($file, "Created with file_put_content() function");
// }

/*===========================================================*/

// Chcking if the file exists or not
// if (file_exists($file)) {
// 	echo 'The File [ '. $file . ' ] is found';

// 	// Writing a content in the file if found
// 	file_put_contents($file, "Added this content with file_put_content() function");
// } else {
// 	echo 'Sorry, the File [ '. $file . ' ] is not found. but, I created it for you';

// 	// Creating the file and writing a content into it
// 	file_put_contents($file, "Created with file_put_content() function");
// }
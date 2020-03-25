<?php
	$mainColor = '#fff'; // Set the main color
	if($_SERVER['REQUEST_METHOD'] === 'POST') { // Check of it is a POST method
		$mainColor = $_POST['color']; // Change the main color to the choosen one
		setcookie('Background', $mainColor, time() + 3600, '/'); // Set a Cookie with the value of the color
	}

	if(isset($_COOKIE['Background'])) { // Check if there is a cookie with the 'Background' name
		$body = $_COOKIE['Background']; // Store the color to a variable
	} else {
		$body = $mainColor; // or store the main color to a variable
	}
?>


<html>
	<head>
		<meta charset="UTF-8">
		<title>Modify Cookie</title>
	</head>
	<!-- use the stored color in the variable to change the body background-color -->
	<body style='background: <?php echo $body; ?>;'>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="color" name="color">
			<input type="submit" value="choose">
		</form>
	</body>
</html>
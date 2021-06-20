<?php

	// Checking if the requesting method used in the form is a post method
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// echo the username field
		echo $_POST['username'] . '<br>';

		// collect the browsers array values in a variable
		$browsers = implode(',', $_POST['browser']);

		// This is the data coming from the database
		echo $browsers . '<br>';

		// splitting the data that came from database
		$splitted = explode(',', $browsers);

		foreach($splitted as $split) {
			echo '<a href=' . $split . ' title=' . $split . '>' . $split . '</a><br>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Deal With Checkboxes Insert With PHP</title>
	</head>
	<body>
		<!-- Sending the Data to the same page with the action attribute value like below -->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<input type="text" name="username" placeholder="User Name"><br>
			<input type="checkbox" name="browser[]" value="chrome" id="chrome">
			<label for="chrome">Google Chrome</label><br>
			<input type="checkbox" name="browser[]" value="opera" id="opera">
			<label for="opera">Opera</label><br>
			<input type="checkbox" name="browser[]" value="firefox" id="firefox">
			<label for="firefox">Firefox</label><br>
			<input type="submit" value="Add" title="Add">
		</form>
	</body>
</html>
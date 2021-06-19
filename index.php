<?php

$dir = __DIR__;

echo '<pre>' . $dir . '<br>';

print_r(scandir($dir));

echo '<br>';

foreach(scandir($dir) as $file) {
	if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {

		// require or include could be used here
		echo 'The php file name is ' . $file . ' and its full path is ' . $dir . '\\' . $file . '<br>';
	}
}

echo '</pre>';
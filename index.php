<?php
	// how to use the Error control operator
	$file = @fopen('file.txt', 'r') or die('This file is not found');
<?php

// Control Structure

// goto operator

for ($playerAge = 16;$playerAge <= 32; $playerAge++) {
    // if ($playerAge == 31) goto warning;
    echo "<p>The playe age is $playerAge and he can still plays.</p>";
}

warning:
echo '<h1>Take care !!</h1>';
echo '<h2>Take care !!</h2>';
echo '<h3>Take care !!</h3>';
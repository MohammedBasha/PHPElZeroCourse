<?php

// list()
// extracting values from an array to variables in the same order
$salaries = [1000, 1500, 2000, 2500];
list($slary1, $slary2, $slary3) = $salaries;
// echo $slary1 . '<br>' . $slary2 . '<br>' . $slary3 . '<br>';

// range(start, end, step = 1)
// $numbers = range(4, 15, 3);
$letters = range('ASD', 'MLB', 3);
echo '<pre>';
// print_r($numbers);
// print_r($letters);
echo '</pre>';

echo '<pre>';
print_r($salaries);
echo '</pre>';

for($i = 0, $ii = count($salaries); $i < $ii; $i++) {
    $salaries[$i] += ($salaries[$i] * .1);
}

for($i = 0, $ii = count($salaries); $i < $ii; $i++) {
    echo '<p>The employee No (' . ($i + 1) . ') has a salry = ' . $salaries[$i] . '</p>';
}

for($i = 0, $ii = count($salaries), $total = 0; $i < $ii; $i++) {
    $total += $salaries[$i];
}
echo '<p>The total salaries = ' . $total . '</p>';
echo '<pre>';
print_r($salaries);
echo '</pre>';
<?php

// Assignment operation
// Assign (=) a value (32) to the initialized variable ($age)
// It's recommended to assign a default value to an initialized variable even though you'll change this value later
// $age = 32;
// echo $age;

// THis language is loosly typed, you can initialize a variable without declaring its data type and assigned to any value, and could be changed later

// Local and GLobal variables

$globalVariable = 'Global variable';

function showStatus() {
    echo $globalVariable; // undefined global variable inside local scope
    $globalVariable = 'Local variable';
    echo $globalVariable . '<br>'; // will print the local value

    $localVariable = 'The second local variable';
}

showStatus();
echo $localVariable . '<br>'; // undefined local variable inside global scope

// Static variables
function add1() {
    static $num = 1;
    $num++;
    echo $num . '<br>';
}

add1();
add1();
add1();
add1();
add1(); // every time will add 1 as the variable defined as a static one

// Variable variables
$name = 'ali';
echo $name . '<br>';
$$name = 'Mohammed';
echo $ali . '<br>';
echo $$name . '<br>';

// Function Parameters
// Super GLobal Variables

// Constants:
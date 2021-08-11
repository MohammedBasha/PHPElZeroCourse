<?php

/*
 * Namespaces:
 * https://www.php.net/manual/en/language.namespaces.php
 * https://www.php.net/manual/en/language.namespaces.basics.php
 * 
 * 1- What are namespaces and why to use them?
 * 
 *  - Definition: a way to gather the PHP items under one name (encapsulate items)
 * 
 *  - Problem Solving: to resolve the name collisions (like same classes or functions)
 * 
 * 2- Affected types by namespaces are traits, classes, interfaces, functions, and constants.
 *  - In the case (functions and constants): it will look for the global scope.
 *  - In the case (traits, classes, and interfaces): it will look for the local scope.
 * 
 * 3- Defining namespaces using the namespace keyword.
 *  - YOU MUST define the namespace in the very beginning of any php file (even before any HTML code).
 * 
 * 4- Defining sub-namespaces.
 *  - Main\Utilities
 * 
 * 5- Defining multiple namespaces in the same file.
 *  - Not recommended, but if will use it, define each namespace in curly braces.
 * 
 * 6- Combining global, non-namespaced, code with namespaced code.
 * 
 * 7- Understanding how namespace are interpreted.
 *  - There are 3  types of naming namespaces:
 *      1- unqualified names TestController
 *      2- Qualified, prefixed names Controllers\TestController
 *      3- Fully qualified, prefixed with global operator \Main\Controllers\TestController
 * 
 * 8- Accessing global functions, classes .. etc
 * 
 * 9- Namespace and Dynamic language feature.
 * 
 * 
 * */

//namespace Main\SubName; // if we try to comment this namespace, then the below built-in (DateTime) class and (strtolower()) function in the language will trigger errors

//namespace Main;
//namespace Main\Utilities;
namespace Main\Utilities { // this is an example for POINT 5
    class A // This class is in the scope of namespace Main
    {
        public function __construct() {
            echo 'I\'m an instance of the Class A located in the first namespace Main\Utilities <br>';
        }
    }
    
    include 'exists.php'; // not affected by the namesapce scope as POINT 2
}

//const MY_CONSTANT = 3;

//class DateTime // this is built-in class in the language
//{
//    public function sayWelcome() {
//        echo 'Hello there!';
//    }
//    
//    public function stayAwake() {
//        echo 'Stay awake!';
//    }
//}

//function strtolower() { // this is built-in function in the language
//    echo 'I\'m a function';
//}

//include 'exists.php'; // not affected by the namesapce scope as POINT 2

//class A // This class is in the scope of namespace Main
//{
//    public function __construct() {
//        echo 'I\'m an instance of the Class A located in the namespace Main\Utilities <br>';
//    }
//}

// this will use the Class A located in this file
// As this A() is unqualified name - it will search for a class A in the namespace in this file and if not found will search in the global namespace
//$a = new A;

//$a = new \Main\Utilities\A(); // another way to use the absolute path

//$a = new Actions\A(); // this sub namesspace (Actions) will use the Main\Utilities\Actions namespace without the use keyword

//var_dump($a);

namespace Main\Filters { // Another namespace in the same file - this is an example for POINT 5
    class A
    {
        public function __construct() {
            echo 'I\'m an instance of the Class A located in the second namespace Main\Filters <br>';
        }
    }
}

// To define a global namespace - POINT 6
namespace {
    var_dump((new \Main\Utilities\A()));
}
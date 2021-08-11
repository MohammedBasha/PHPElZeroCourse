<?php

/*
 * Namespaces:
 * https://www.php.net/manual/en/language.namespaces.php
 * https://www.php.net/manual/en/language.namespaces.basics.php
 * 
 * 1- Namespace and Dynamic language feature.
 * 
 * 2- namespace keyword and __NAMESPACE__ constant.
 * 
 * 3- Aliasing / Importing.
 * 
 * 4- Global space.
 * 
 * 5- Autoloading.
 * 
 * */

/* START EXPLAINING POINT 1 && 2 */

//namespace Main\Controllers;
//
//class TestControllers
//{
//    public static function wakeUp() {
//        echo 'Wake wake! <br>';
//    }
//}
//
//function sayWelcome() {
//    echo 'Saying welcome! <br>';
//}

//$a = 'TestControllers'; // when creating a new object from this string wil cause error
//$a = __NAMESPACE__ . '\TestControllers'; // but after using this, it will work
//$var = new $a;

//$var = new namespace\TestControllers;

//var_dump($var);
//var_dump((new namespace\TestControllers));

//TestControllers::wakeUp();
//namespace\TestControllers::wakeUp();

/* END EXPLAINING POINT 1 && 2 */

/* START EXPLAINING POINT 3 */

//include 'exists_2.php';
//use Main\Model as Models;
//
//$model = new Models\TestModel;

/* END EXPLAINING POINT 3 */

/* START EXPLAINING POINT 5 */

//echo get_include_path();

define('APP_PATH', dirname(realpath(__FILE__))); // root directory

// if you want to know the directories seperator (windows or linux) use: 
define('DS', DIRECTORY_SEPARATOR); // directory seperator - will be usefull for directories including

// if you want to know the path seperator (windows or linux) use: 
define('PS', PATH_SEPARATOR); // path seperator - will be usefull for path including

define('CONTROLLERS_PATH', APP_PATH . DS . 'controllers'); // just n example with no directories
define('MODELS_PATH', APP_PATH . DS . 'models'); // just n example with no directories

$paths = get_include_path() . PS . CONTROLLERS_PATH . PS . MODELS_PATH;

set_include_path($paths); // this will set new paths PHP will look in it for auoload classes

//function __autoload($class) { // triggers when you create a new instance of a class and looking for the class files in default path
//    require strtolower($class) . '.php';
//}

// for performance assurance use spl_autoload_register() instead of __autoload()
function autoLoader($class) {
    require strtolower($class) . '.php';
}
spl_autoload_register('autoLoader');

$a = new A;
$b = new B;
$c = new C;

/* END EXPLAINING POINT 5 */
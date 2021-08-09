<?php

/* 
 * Magic methods:
 * 
 * Properties and methods Overloading
 * 
 * - Property overloading: when getting or setting inaccessible property either not in the class context or due to protected or private access modifiers
 * 
 * __set:
 *  - Runs when writing data to inaccessible property.
 * 
 * __get:
 *  - Runs when a call is made to inaccessible property.
 * 
 * __isset:
 *  - triggered when calling isset() or empty() on inaccessible property.
 * 
 * __unset:
 *  - triggered when calling unset() on inaccessible property (found in the class but has private or protected).
 * 
 * __call:
 *  - triggered when invoking inaccessible methods in an object context.
 * 
 * __callStatic:
 *  - triggered when invoking inaccessible methods is a static context.
 */

class Student
{
//    public $name;
    private $name;
    private $age; // used to explain __set() method
    private $data = [];
    
    public function __construct() { // magic method triggered when the class is instantiated
        
    }
    
    public function __destruct() { // magic method triggered when destroying the class
        
    }
    
    public function __set($name, $value) { // must be public
        echo 'The method has been called<br>';
//        $this->name = $value;
//        echo '$name is ' . $name . '<br>';
//        echo '$value is ' . $value . '<br>';
        $this->data[$name] = $value;
    }
    
    public function __get($key) { // when calling inaccessible property
//        if(array_key_exists($key, $this->data)) {
//            return "Inaccessibke property $key = " . $this->data[$key] . '<br>';
//        } else {
//            trigger_error('Sorry no key like ' . $key . ' found in the data array', E_USER_ERROR);
//        }
        
        // isset() is checking if the argument is found and != NULL
        // but if you want to change the behavior you can redeclare __isset() like below
        if(isset($key)) {
            return $this->data[$key];
        } else {
            trigger_error('Sorry no key like ' . $key . ' found in the data array', E_USER_ERROR);
        }
    }
    
    public function __isset($name) {
//        if (property_exists($this, $name)) {
//            echo 'The property named [' . $name . '] is found';
//        } else {
//            echo 'The property named [' . $name . '] is not found';
//        }
        
        if(array_key_exists($name, $this->data)) {
            echo 'The property named [' . $name . '] is found';
            return true;
        } else {
            echo 'The property named [' . $name . '] is not found';
            return false;
        }
    }
    
    public function __unset($name) {
        if(isset($this->$name)) {
            unset($this->data[$name]);
        }
    }
    
    public function __call($name, $arguments) { // using sayWelcome() to explain this
        if(method_exists($this, $name)) {
            $this->$name($arguments); // $name: here is the parameter that will have the method name
        } else {
            print_r($arguments);
            trigger_error('Method [' . $name . '] was not found', E_USER_ERROR);
        }
    }
    
    private function sayWelcome($param) { // explaining __call() method, 
        echo 'Hello from Private ';
    }
    
    // must be public and static
    // Explaining the static method sayHello();
    public static function __callStatic($name, $arguments) {
        echo 'A call to a static method [' . $name . '] was not found';
    }
}

echo '<pre>';

$child = new Student;

//$child->name = 'Ahmed';
//
//$child->age = 16; // this is called overloading - the property is not found or inaccessible due to protected or private - this will trigger __set() magic method if it's declared or fatal error
//
//echo $child->age; // will trigger the __get() method

//echo $child->test; // will trigger the __get() method

//var_dump($child);

//isset($child->age);

//unset($child->test);

//$child->sayWelcome('as', 1, 'ash'); // for __call() nethod

Student::sayHello();

echo '</pre>';
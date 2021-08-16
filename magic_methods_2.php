<?php

/*
 * Serialization: converting complex or compound variable (array or object) to string representation.
 * 
 * Mageic method:
 * __sleep: used to return an array of the wanted properties that need serialization
 * 
 * __wakeup: used when unserializng an object like example below that have PDO object
 * 
 * __toString: used to print a string when echo an object
 * 
 * __invoke: (PHP 5.3+) used to call the object as a function
 * 
 * __set_state() && var_export(): called when var_export() an object that show the properties that being set in the object
 * 
 * __clone: // used when cloning
 * 
 * __debugInfo: (PHP 5.6) - choose what to be shown in var_dump()
 * 
*/

echo '<pre>';

//$arr = [1, 2, 3];
//echo serialize($arr); // Serialization

//class Test
//{
//    public $name;
//}
//$obj = new Test;
//$obj->name = 'Mohammed';
//echo serialize($obj); // Serialization

class DataBase
{
    public $link;
    public $dsn;
    public $username;
    public $password;
    public $queryCache;
    
    public function __construct($dsn, $username, $password) {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->link = new PDO($dsn, $username, $password);
    }
    
    public function __sleep() { // used when serializing
        return ['dsn', 'username', 'password', 'queryCache'];
    }
    
    public function __wakeup() { // used when unserializing
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }
    
    public function __toString() { // when echo the object this will trigger
        return 'The username which has been used to connect to the database is: ' . $this->username;
    }
    
    public function __invoke($welcome = '') { // triggered when calling the object as a function
        echo 'Welcome to the object ' . $welcome;
    }
    
    public function __clone() { // when cloning, this properties will be the new values
        $this->username = null;
        $this->password = null;
    }
}

$obj = new DataBase('mysql://hostname=localhost;dbname=phpmyadmin', 'phpmyadmin', '123');

//var_dump($obj);

//$serializedObj = serialize($obj); // you can't serialize PDO Object unless calling __sleep() to select what property to be serialized

//echo $serializedObj;

//$obj2 = unserialize($serializedObj);// calling __wakeup() to add the PDO connection again

//var_dump($obj2);

//echo $obj;// use __toString() to print the Object

//$obj('Mohammed'); // when calling the object as a function the __invoke() method will triggered

//echo'var_export: <br>';
//var_export([1, 2, 3, 4]); // string representation to the array
//echo'<br>var_dump: <br>';
//var_dump([1, 2, 3, 4]);
//echo'<br>print_r: <br>';
//print_r([1, 2, 3, 4]);
//echo'<br>';

// when var_export(Object) it will trigger __set_state() magic method
//var_export($obj);

//$obj2 = $obj; // when using the two identifiers way 
//$obj2 =& $obj; // when using the reference way it's the same Object found in the memory but with two names (identities)
//
$obj2 = clone ($obj); // this is cloning a new different object

//var_dump($obj);
//echo '<br>';
//var_dump($obj2);

class C {
    private $prop;
    private $prop2;
    private $prop3;
    private $prop4;
    private $prop5;

    public function __construct($val) {
        $this->prop = $val;
    }

    public function __debugInfo() {
        return [
            'propSquared' => $this->prop ** 2,
        ];
    }
}

var_dump(new C(2));


echo '</pre>';
<?php

/*
 * Instantiation: is creating an object of a Class
 * $ahmed or $mohammed is an instance of the Class Student
 *
 * 
 * Constructors:
 * A method that's usually public, but id you defined it as private the new Objects won't run this method
 * When creating a new object of the class you can ommit the (), unless you want to pass an arguments to the _construct() function.
 * 
 *
 * Destructors
 * 
 * Access modifiers - Visibility:
 *     public: The property or method defined as public could be accessed inside or outside the class from any object of this class.
 *     
 *     private: The property or method can be accessed only inside the main class
 *              When setting a property as private, the only way to access it is through the main class like with setters and getters, to enforce the user not to set the property directly and type any unvalid input
 *     
 *     protected: The property or method can be accessed in the class or the inherited classes.
 * 
 * Inheritance:
 * 
 * self::property : it's calling the parent class
 * static::propery : it's calling the running Class
 * https://www.php.net/manual/en/language.oop5.late-static-bindings.php
 * 
 * static keyword: its not used in the object instantiated
 * 
*/

class Student
{ // Starting class context
    protected $name;
    protected $age;
    protected $level;
    protected $score;
    protected $subjects = [
        'Arabic'    => 0,
        'English'   => 0,
        'Math'      => 0,
        'Science'   => 0
    ];
    protected $minScore = 150;
    protected $maxScore = 300;
    
    const MIN_AGE = 12;
    const MAX_AGE = 21;
    
    public function __construct($name, $age) {
         $this->name = $name;
         $this->age = $age;
         echo 'Starting the parent constructor class <br> ';
         echo 'Static From Parent Class ' . static::MIN_AGE . ' ' . static::MAX_AGE . '<br>'; // static will be called from the used class that call it, if it is override the constants in the parent
         echo 'Self From Parent Class ' . self::MIN_AGE . ' ' . self::MAX_AGE . '<br>'; // self will be used from the parent class
         echo 'End the parent constructor class <br> ';
         echo '<br>The called class is ' . get_called_class() . '<br>'; // to know the called class
         echo '<br>The called class is ' . __CLASS__ . '<br>'; // to know the called class
     }

    public function setName($name) {
        $this->name = $this->filterName($name);
    }

    protected function getName() {
        return $this->name;
    }

    private function filterName($name) {
        return ucwords(substr($name, 0, 12));
    }

    protected function setLevel($level) {
        $level = abs(filter_var($level, FILTER_SANITIZE_NUMBER_INT));
        if ($level < 1 || $level > 12) {
            throw new Exception("Sorry the level can't be less than 1 or greater than 12");
        } else {
            $this->level = $level;
        }
    }

    protected function getLevel() {
        return $this->level;
    }
} // Ending class context

$ahmed = new Student('Mohammed', 33);
// echo $ahmed->name; // Accessing the property name and print it
//$ahmed->setLevel('-5');
// echo $ahmed->getLevel();
//$ahmed->setName('mohammed ahmed ebrahem');
// echo $ahmed->getName();
//echo $ahmed->maxScore;

class Grade1Student extends Student
{
    const MIN_AGE = 13;
    const MAX_AGE = 25;
    public function __construct($name, $age) {
        echo 'Line 88 inherited from Parent in CHild ';
        parent::__construct($name, $age); // to inherit the parent's class constructor function
    }
}

$ali = new Grade1Student('Mohammed ahmed', 15);
echo 'From $ali variable ' . $ali::MIN_AGE . ' ' . $ali::MAX_AGE . '<br>';
echo 'From Student Class ' . Student::MIN_AGE . ' ' . Student::MAX_AGE . '<br>';
echo 'From Grade1Stutend CLass ' . Grade1Student::MIN_AGE . ' ' . Grade1Student::MAX_AGE . '<br>';
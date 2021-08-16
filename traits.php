<?php

/*
 * Traits:
 * 1- What is the traits?
 *  - one of the solutions for single inheritance in PHP.
 *  - you can use more than one trait to be used in one class.
 *  - Can't be instantiated to objects.
 *  - Wrapper some of properties and methods to use in more than one class.
 * 
 * 2- Precedence of members.
 *  - members: members in class are constants, methods, and properties.
 *  - member precedence: Child Class >> Trait >> Parent Class.
 * 
 * 3- Using multiple traits.
 *  - you can use mroe than trait by using (use) operator and coma-seperated traits.
 * 
 * 4- Resolving the namin conflict with (insteadof) and (as) operators.
 *  - using (insteadof) to use an repeated method in two traits to teke precedence.
 *  - using (as) to change the name of the repeated method.
 * 
 * 5- Change the visibility with (as) operator.
 * 
 * 6- Traits composed from traits.
 * 
 * 7- Abstract methods in traits.
 * 
 * 8- Static trait methods.
 * 
 * 9- Defining properties and conflict resolution.
 * 
*/

trait Test
{
//    public $name = 'Mohammed';
    public $name = 'Mohammed';
    
    public function hello() { // this method will take precedence after Child Class and before Parent Class (extended class)
        echo 'Hello from Trait 1 <br>';
    }
    
    protected function sayWelcome() {
        // you can't call this method directly as it's protected
        // $this->sayWelcome(); IS WRONG
        // you can call it in the class using this trait.
        echo 'Welcome to our website <br>';
    }
    
    abstract public function body();
    
    public static function helloGroup() {
        echo 'Hello All Group! <br>';
    }
}

trait Test2
{
    public function hello() {
        echo 'Hello from Trait 2 <br>';
    }
}

trait ParentTrait
{
    use Test, Test2 { // openning curly braces to do process on the two traits
        Test::hello insteadof Test2;
    }
}

class ParentClass
{
    public function hello() { // this method will take the last precedence since after Trait and Child Class
        echo 'Hello from Parent Class <br>';
    }
}

class ChildClass extends ParentClass
{
//    public $name = 'Ahmed'; // will cause a fatal error if assigning a new value instead of the old one in the Test trait
    
//    use Test, Test2 { // openning curly braces to do process on the two traits
//        Test::hello insteadof Test2;
//        Test2::hello as welcomeHello;
//    }
    
//    use Test {
//        hello as protected; // changing the access modifier visibility
//    }
    
    use ParentTrait;
    
    public function callWelcome() { // call the protected method from trait
        $this->sayWelcome();
    }
    
//    public function hello() { // this method will take the first precedence over Trai and Parent Class
//        echo 'Hello from Child Class <br>';
//    }
    
    public function body() {
        echo 'Hello from body() function <br>';
    }
}

//(new ChildClass)->hello(); // Creating an object on the fly - applying Test trait method
//(new ChildClass)->hello2(); // Applying Test2 trait method

//(new ChildClass)->callWelcome();

//(new ChildClass)->welcomeHello(); // using the Test2 trait method with different name using (as) operator

//(ChildClass::helloGroup()); // calling the static method foun in Test trait

$child = new ChildClass;
//$child->name = 'Mahmoud';
echo $child->name;
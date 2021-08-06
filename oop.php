<?php

/*
 * OOP: Object-Oriented Programing
 * 
 * Class - Object
 * 
 * Class represent a template consists of properties (attributes) and methods (functions)
 *
 * An object is an instance of a class
 *
 * By default the attribute value is NULL unless you put a primary value
 *
 * https://www.codeproject.com/Articles/22769/Introduction-to-Object-Oriented-Programming-Concep
 *
 * 
*/

class Employee
{ // The body of the class
    // You precede your properties and methods with one of the access modifiers:
        // public - protected - private
    public $name;
    public $age;
    public $address;

    public $salary;
    public $tax;
    public $overtime;
    public $overtimeRate;
    public $abbsent;
    public $abbsentRate;

    public function calculateOvertime()
    {
        return $this->overtime * $this->overtimeRate;
    }
}

$ahmed = new Employee();
$mohammed = new Employee();

$ahmed->name = 'Ahmed';
$mohammed->name = 'Mohammed';

// echo is_a($ahmed, 'Employee');


class Car
{
    public $doors;
    public $wheels;
    public $rimes;
    public $speed;
    public $horsePower;
    public $color;
}
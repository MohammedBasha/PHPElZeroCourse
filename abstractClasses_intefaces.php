<?php

/*
 * In PHP you can inherit from one class only unlike other Programing Languages that support Multiple inheritance
 * 
 * Abstract Classes: a class that can't be used to instantiate an object from it, so it's used to be inherited from other classes
 * - it's not required to abstract all the method in this class
 * - You can use public or protected access modifires, but you can't use private
 * 
 * Intefaces: pure prototypes
 * - only have methods with optionally arguments
 * - all the methods must be abstracted (without body)
 * - You can use only public access modifire
 * - you can implement more than one interface on the classes
 */

abstract class Employee
{ // Can't create an object from it - i's for inheritance only
    // General information for all employees
    public $firstName;
    public $lastName;
    public $age;
    public $address;
    
    public $salary;
    public $tax;
    public $overTime;
    public $overTimeRate;
    public $absent;
    public $absentRate;
    
    // Starting the Salary methods that will be inherited to all the classes extending this class
    
    public function getOverTime() {
        return $this->overTime * $this->overTimeRate;
    }
    
    public function getAbbsent() {
        return $this->absent * $this->absentRate;
    }
    
    public function getSalary() {
        return $this->salary - ($this->salary * $this->tax);
    }
    
    //  This showTotalSalary() method will vary depending on each Class, so it will be defined here as an abstracted methods without body, then each class will define it and use it the way it should
    // It can be public or protected, but can't be private (private can't be inherited)
    abstract protected function showTotalSalary();
    
    // Ending the Salary methods
}

interface EmployeeInterface
{
    public function showAddress();
}

class Manager extends Employee implements EmployeeInterface
{
    public $audits; // this property will be used in the salary methods, so the salary methods will be different in this class from the other classes
    public $auditRate = 100; // this property will be used in the salary methods, so the salary methods will be different in this class from the other classes
    
    public function showTotalSalary() { // This is an abstracted method defined in the abstarct class
        return $this->getSalary() + $this->getOverTime() - $this->getAbbsent() + ($this->audits * $this->auditRate);
    }
    
    public function showAddress() {
        return $this->address;
    }
}

class SuperVisor extends Employee implements EmployeeInterface
{
    public $successfullProjects; // this property will be used in the salary methods, so the salary methods will be different in this class from the other classes
    public $successfullProjectRate = 1000; // this property will be used in the salary methods, so the salary methods will be different in this class from the other classes
    
    public function showTotalSalary() { // This is an abstracted method defined in the abstarct class
        return $this->getSalary() + $this->getOverTime() - $this->getAbbsent() + ($this->successfullProjects * $this->successfullProjectRate);
    }
    
    public function showAddress() {
        return $this->address;
    }
}

class Worker extends Employee
{
    public $bonus = 100; // this property will be used in the salary methods, so the salary methods will be different in this class from the other classes
    
    public function showTotalSalary() { // This is an abstracted method defined in the abstarct class
        return $this->getSalary() + $this->getOverTime() - $this->getAbbsent() + $this->bonus;
    }
}

$mohammed = new Manager();

$mohammed->salary = 5000;
$mohammed->tax = .01;
$mohammed->overTime = 30;
$mohammed->overTimeRate = 15;
$mohammed->absent = 2;
$mohammed->absentRate = 75;
$mohammed->audits = 10;

echo $mohammed->getOverTime() . ' L.E <br>';
echo $mohammed->getAbbsent() . ' L.E <br>';
echo $mohammed->getSalary() . ' L.E <br>';
echo $mohammed->showTotalSalary() . ' L.E <br>';
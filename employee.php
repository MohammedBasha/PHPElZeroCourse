<?php

class Employee {
    private $id;
    private $name;
    private $age;
    private $address;
    private $tax;
    private $salary;
    
    public function __construct($name, $age, $tax, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->tax = $tax;
        $this->salary = $salary;
    }
    
    // when changing the props to private, you must use the magic method get to get the data
    public function __get($prop) {
        return $this->$prop;
    }
    
    public function calculateSalary() {
        return $this->salary - ($this->salary * $this->tax / 100);
    }
}

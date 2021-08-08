<?php

/*
 * Inheritance: is a relationship between classes (parent (Trainer) and child (WebDevelopmentTrainer)) - the child will inherit from parent
 * 
 * Association: The First Class (WebDevelopmentTrainer) is using the second Class (Book) to finish a process (training) - could be used or not - no one have the other or dependent on the other
 * 
 * Aggregation: a controler class (TrainingProgram) that sets some controls for another class (Student), so if any of those disappeared, nothing happens to any of them - each one is dependent on itself
 * 
 * Composition: a tide relationship between two classes (dependent on each other), if one disappeared the second will be affected
 * 
 */

/**
 * 
 * Objects regards this lecture:
 * 1- Trainer
 * 2- WebDevelopmentTrainer
 * 3- Book
 * 4- Student
 * 5- TrainingProgram
 */

/*
 * Requirements:
 * 1- The WebDevelopmentTrainer is a type of Trainer (Inheritance)
 * 2- The WebDevelopmentTrainer uses a book as a reference (Association)
 * 3- The TrainingProgram can have many students (Aggregation)
 * 4- The WebDevelopmentTrainer is responsible for ensuring the success of the trainingProgram (Composition)
 * 5- The WebDevelopmentTrainer's salary will be raised if the training rate is good enough (Composition)
 */

class Trainer // requirement 1
{ // Parent
    public $name; // prototype 
    public $salary; // prototype 
    public $age; // prototype 
    public $rate; // according to the requirement 4 && 5
    
    public function isAGoodTrainer() { // prototype 
        
    }
}

class WebDevelopmentTrainer extends Trainer // requirement 1 && requirement 2 && requirement 4
{ // Child - Inheritance relationship with the Parent (Trainer)

    // Composition relationship with trainingProgram Class
    // Ensuring the success of the trainingProgram Class and will be affected if not
    
    public function isTheTrainerQualified() { // prototype 
        // if he is qualified to finish this training
    }
    
    public function addBook(Book $book) { // accepts Object of the type Book
        // according to the requirement 2
        // The WebDevelopmentTrainer can add a book as a tool for training but won't be the only tool (It's optional) - it can disappear without any effect
        // and the WebDevelopmentTrainer Class is not the parent of the Book Class
        // and the Book Class is not the parent (or owner) of the WebDevelopmentTrainer Class - also it can disappear without any effect - has its own life cycle
        
        
    }
    
    public function paySalary() { // according to the requirement 4 && 5
        if($this->rate === true) {
            echo 'You will be paid';
        }
    }
}

class Book // requirement 2
{ // Association relationship with the (WebDevelopmentTrainer) class - could be used or not
    public $title; // prototype 
    public $author; // prototype 
    public $isbn; // prototype 
    public function canBeBorrowed() { // prototype 
        
    }
    
    public static function isBorrowedBy(Trainer $trainer) { // accepts Object of the type Trainer
        // according to the requirement 2
        // Any Book Class can be borrowed by the Trainer Class or not borrowed at all
        // it can disappear without any effect - has its own life cycle
        return $trainer->name;
    }
}

class TrainingProgram // requirement 3 && requirement 4
{
    // Aggregation relationship with Student Class
    // The TrainingProgram Class could have more than Student Class
    // If the Student Class disappeared - no thing will happened to TrainingProgram Class
    
    // Composition relationship with WebDevelopmentTrainer Class
    // TrainingProgram Class can't proceed without WebDevelopmentTrainer Class
    
    public $title; // prototype 
    public $studentList; // prototype 
    public $trainer; // according to the requirement 4 && 5
    
    public function showStudentsList() { // prototype 
        return $this->studentList;
    }
    
    public function addStudent(Student $student) { // requirement 3
    // accepts Object of the type Student
        $this->studentList[] = $student;
    }
    
    public function isTrainerGood(Trainer $trainer) { // according to the requirement 4 && 5
        // accepts Object of the type Trainer
        $this->rate = true;
    }
}

class Student // requirement 3
{
    // Aggregation relationship with TrainingProgram Class
    // Student Class could have more than TrainingProgram Class
    // If the TrainingProgram Class disappeared - no thing will happened to Student Class
    public $name; // prototype 
    public $age; // prototype 
}

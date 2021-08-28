<?php
require_once './db.php'; // including the database connection
require_once './abstract_model.php'; // including the main class to be inherited from

/* THIS INHERITED CLASS WAS FOR TEST */

class Employee extends AbstractModel {
    // Defining the columns of the table 'employees' 
    public $id;
    public $name;
    public $age;
    public $address;
    public $tax;
    public $salary;
    
    // Get the table name as a static property
    protected static $tableName = 'employees';
    
    // Ensure the type of each column of the table
    protected static $tableSchema = [
        'name'      => self::DATA_TYPE_STR,
        'age'       => self::DATA_TYPE_INT,
        'address'   => self::DATA_TYPE_STR,
        'tax'       => self::DATA_TYPE_DECIMAL,
        'salary'    => self::DATA_TYPE_DECIMAL
    ];
    
    // Define the primary key
    protected static $primaryKey= 'id';
    
    // you can use the constructor to insert the data
    public function __construct($name, $age, $address, $tax, $salary) {
        global $connection;
        
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
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
    
    function fireEmployee() {
        
    }
    
    function promoteEmployee() {
        
    }
    
    function getTableName() {
        return self::$tableName;
    }
}

/* ENDING THE INHERITED CLASS FOR TEST */

if (isset($_POST['submit'])) { // when the user inserting data to the form do this
    
    // Filter each filed
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $tax = filter_input(INPUT_POST, 'tax', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        
    // Inserting or updating
    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($id > 0) {
            $emp = Employee::getByPK($id); // get the employee by its primary key
            $emp->name = $name;
            $emp->age = $age;
            $emp->address = $address;
            $emp->tax = $tax;
            $emp->salary = $salary;
        }
    } else { // or insert new employee
        $emp = new Employee($name, $age, $address, $tax, $salary);
    }
    
    // executing the insert statement
    if ($emp->save() === true) { // create or update employee
        $message = 'New emloyee has been saved successfully';
        header('Location: index.php');
        exit();
    } else {
        $message = 'Sorry No employees was saved';
    }
}

// Handling the Edit record with $_GET super global array
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id > 0) {
        $emp = Employee::getByPK($id);// get the emp with its primary key
    }
}

// Handling the Delete record
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id > 0) {
        $emp = Employee::getByPK($id);
        if ($emp->delete() === true) { // delete the employee
            $message = 'Employee has been deleted successfully';
            header('Location: index.php');
            exit();
        }
    }
}

 // reading the data from the db
$result = Employee::getAll();

$emps = Employee::get( // get specific records based on where statement
        'select * from employees where age = :age',
        ['age' => [Employee::DATA_TYPE_INT, 33]]
);
var_dump($emps);
?>

<html>
    <head>
        <title>PDO Example</title>
    </head>
    <body style="display: flex;">
        <p><?= isset($message)? $message : ''; ?></p>
        <div class="empForm">
            <form method="post">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" value="<?= isset($emp)? $emp->name : ''; ?>" required><br>
                
                <label for="age">Age: </label>
                <input type="number" name="age" id="age" min="18" max="60" value="<?= isset($emp)? $emp->age : ''; ?>" required><br>
                
                <label for="address">Address: </label>
                <input type="text" name="address" id="address" maxlength="100" value="<?= isset($emp)? $emp->address : ''; ?>" required><br>
                
                <label for="tax">Tax %: </label>
                <input type="number" name="tax" id="tax" step="0.01" min="1" max="5" value="<?= isset($emp)? $emp->tax : ''; ?>"><br>
                
                <label for="salary">Salary: </label>
                <input type="number" name="salary" id="salary" step="0.01" min="1500" max="9000" value="<?= isset($emp)? $emp->salary : ''; ?>"><br>
                
                <input type="submit" name="submit" value="save">
            </form>
        </div>
        <div class="empInfo">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Tax</th>
                    <th>Salary</th>
                    <th>Controls</th>
                </tr>
                    <?php
                    if (false !== $result) {
                        foreach ($result as $employee) {
                    ?>
                <tr>
                    <td><?= $employee->id; ?></td>
                    <td><?= $employee->name; ?></td>
                    <td><?= $employee->age; ?></td>
                    <td><?= $employee->address; ?></td>
                    <td><?= $employee->tax; ?></td>
                    <td><?= $employee->calculateSalary(); ?></td>
                    <td>
                        <a href="<?= $_SERVER['PHP_SELF'] . '?action=edit&id=' . $employee->id; ?>" title="Edit">Edit</a>
                        <a href="<?= $_SERVER['PHP_SELF'] . '?action=delete&id=' . $employee->id; ?>" title="Delete" onclick="if(!confirm('Do you want to delete this Employee?')) return false;">Delete</a>
                    </td>
                </tr>
                    <?php
                        }
                    } else {
                    ?>
                <tr>
                    <td>No Employees</td>
                <tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </body>
</html>

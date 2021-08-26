<?php

/* 
 * To deal with Database with an OOP Interface you can use one of these drivers:
 * 1- mysqli
 * 2- PDO
 * - https://www.php.net/manual/en/book.pdo.php
 * 
 * - to know the loaded modules in php via Command line:
 * > php -m
 * - or using the function get_loaded_extensions()
 * 
 * - The returning data from the Database are (Resource) compound (complex) data type.
 * 
 * - To start using the database:
 * 1- Establish a connection to your db server.
 * 2- Select your db.
 * 3- Manipulate your db tables.
 * 4- Close your connection.
 * 
 */


//echo '<pre>';
//var_dump(get_loaded_extensions());
//echo '</pre>';

// $dsn = data source name >> mysql://hostname=localhost;dbname=php_pdo

$connection = null;
$dsn = 'mysql://hostname=localhost;dbname=php_pdo';
$user = 'root2';
$pass = '123';
$options = [
    // command to be executed in every MySQL query to enable the inserting of arabic data without any errors
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
try {
    $connection = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Sorry you got this error: ' . $e->getMessage();
}

require_once './employee.php';

//echo '<pre>';

// PDO::exec() returning the number of rows affected by the statement && used with insert, update, and delete statements
//var_dump($connection->exec('select * from employees'));

// PDO::query() returning the result set (if any) returned by the statement as a PDOStatement object
//var_dump($connection->query('select * from employees'));

//echo '</pre>';

//$name = 'Osama';
//if ($connection->exec('insert into employees set name = "' . $name . '"')) {
//    echo 'New emloyee ' . $name . 'has been inserted successfully';
//}

if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $tax = filter_input(INPUT_POST, 'tax', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
//    $employee = new Employee($name, $age, $tax, $salary);
    $employee = new Employee;
    $employee->name = $name;
    $employee->age = $age;
    $employee->address = $address;
    $employee->tax = $tax;
    $employee->salary = $salary;
    
    $insertStmt = 'insert into employees set name="' . $name . '", age=' . $age . ', address="' . $address . '", tax=' . $tax . ', salary=' . $salary;
    
    if ($connection->exec($insertStmt)) {
        $message = 'New emloyee ' . $name . ' has been inserted successfully';
    } else {
        $message = 'Sorry No employees was added';
    }
}

$sql = 'select * from employees';
$stmt = $connection->query($sql);
//$resutl = $stmt->fetchAll(PDO::FETCH_BOTH); // fetches each record in the db as an indexed array with indexed columns
//$resutl = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetches records as associative array
//$resutl = $stmt->fetchAll(PDO::FETCH_OBJ); // fetches records as an object
$resutl = $stmt->fetchAll(PDO::FETCH_CLASS, 'Employee'); // fetches records as an object
//echo '<pre>';
//var_dump($resutl);
//echo '</pre>';

$result = (is_array($resutl) && !empty($resutl))? $resutl : false;

?>

<html>
    <head>
        <title>PDO Example</title>
    </head>
    <body>
        <p><?= isset($message)? $message : ''; ?></p>
        <div class="empForm">
            <form method="post">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required><br>
                
                <label for="age">Age: </label>
                <input type="number" name="age" id="age" min="18" max="60" required><br>
                
                <label for="address">Address: </label>
                <input type="text" name="address" id="address" maxlength="100" required><br>
                
                <label for="tax">Tax %: </label>
                <input type="number" name="tax" id="tax" step="0.01" min="1" max="5"><br>
                
                <label for="salary">Salary: </label>
                <input type="number" name="salary" id="salary" step="0.01" min="1500" max="9000"><br>
                
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

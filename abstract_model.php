<?php

/* 
 * Model: It's a class that contains all the properties and methods that related to a part of the application
 * 
 * Abstract Model: is the base that you start with to inherit to any class
 * 
 */

class AbstractModel {
    // Defining constants for each data type we may use
    const DATA_TYPE_BOOL = PDO::PARAM_BOOL;
    const DATA_TYPE_STR = PDO::PARAM_STR;
    const DATA_TYPE_INT = PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL = 4;
    
    // Prepare the values coming from the $tableSchema columns array
    private function prepareValues(PDOStatement &$stmt) {
        foreach (static::$tableSchema as $columnName => $type) {
            if ($type == 4) {
                $sanitizedValue = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}", $sanitizedValue);
            } else {
                $stmt->bindValue(":{$columnName}", $this->$columnName, $type);
            }
        }
    }
    
    // Building the sql statmenet that contain he columns names that need to be used
    private static function buildNameParametersSQL() {
        $namedParams = '';
        foreach (static::$tableSchema as $columnName => $type) {
            $namedParams .= $columnName . ' = :' . $columnName . ', ';
        }
        return trim($namedParams, ', ');
    }
    
    // Creating a new record
    private function create() {
        global $connection;
        $sql = 'insert into ' . static::$tableName . ' set ' . self::buildNameParametersSQL();
        $stmt = $connection->prepare($sql);
        $this->prepareValues($stmt);
        return $stmt->execute();
    }
    
    // Updating existing record
    private function update() {
        global $connection;
        $sql = 'update ' . static::$tableName . ' set ' . self::buildNameParametersSQL() . ' where ' . static::$primaryKey . ' = ' . $this->{static::$primaryKey};
        $stmt = $connection->prepare($sql);
        $this->prepareValues($stmt);
        return $stmt->execute();
    }
    
    // Creating or updating record depending on its primary key
    public function save() {
        return $this->{static::$primaryKey} === null? $this->create() : $this->update();
    }
    
    // Deleting record
    public function delete() {
        global $connection;
        $sql = 'delete from ' . static::$tableName . ' where ' . static::$primaryKey . ' = ' . $this->{static::$primaryKey};
        $stmt = $connection->prepare($sql);
        return $stmt->execute();
    }
    
    // Get all records
    public static function getAll() {
        global $connection;
        
        $sql = 'select * from ' . static::$tableName;
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        return is_array($result) && !empty($result)? $result : false;
    }
    
    // Get specific record based on its Priamry key
    public static function getByPK($pk) {
        global $connection;
        
        $sql = 'select * from ' . static::$tableName . ' where ' . static::$primaryKey . ' = "' . $pk . '"';
        $stmt = $connection->prepare($sql);
        if ($stmt->execute() === true) {
            $obj = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
            return array_shift($obj);
        }
        return false;
    }
    
    // Get specific records
    public static function get($sql, $options = []) {
        global $connection;
        $stmt = $connection->prepare($sql);
        
        if (!empty($options)) {
            foreach ($options as $columnName => $type) {
                if ($type[0] == 4) {
                    $sanitizedValue = filter_var($type[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $stmt->bindValue(":{$columnName}", $sanitizedValue);
                } else {
                    $stmt->bindValue(":{$columnName}", $type[1], $type[0]);
                }
            }
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        return is_array($result) && !empty($result)? $result : false;
    }
}
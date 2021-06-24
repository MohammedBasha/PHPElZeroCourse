<?php

// We can deal with the Database with the following ways:

// 1- Command line.
// 2- phpMyAdmin.
// 3- MySQL Workbench App.

// 1- With Command Line:

// you can create a shortcut in the desktop and change the path in it to C:\xampp\mysql\bin

// Open CMD and login with the user
// > mysql -u user -p pass

// To create a database
// > CREATE DATABASE IF NOT EXISTS ecom;

// To show databases:
// > show databases;

// to drop a database
// > DROP DATABASE IF EXISTS ecom;

// to use database
// > use ecom;

// to create table in database
// >  CREATE TABLE IF NOT EXISTS students (id int(11), name varchar(255), email varchar(255));

// to show tables in database
// > show tables;

// to show all data in table
// > SELECT * FROM tableName;

// to show the table structure
// > describe tableName;
// > show columns from tableName;
// > show fields from tableName;

// to know the table information
// > show table status;

// to know the command that used to create a table
// > SHOW CREATE TABLE tableName;

// to drop a TABLE
// > DROP TABLE IF EXISTS tableName;

// to rename a table
// > RENAME TABLE tableName To newTableName, tableName2 To newTableName2;
// > ALTER TABLE tableName RENAME newTableName;

// to change table ENGINE
// > ALTER TABLE tableName ENGINE = MYISAM;

// to add table column at the last
// > ALTER TABLE tableName ADD columnName varchar(255);

// to add table column after specific column
// > ALTER TABLE tableName ADD columnName varchar(255) AFTER columnName;

// to add table column at the beginning
// > ALTER TABLE tableName ADD columnName varchar(255) FIRST;

// to delete table column
// > ALTER TABLE tableName DROP columnName;

// to change column name, data type or ordering
// > ALTER TABLE tableName CHANGE columnName columnName varchar(255) AFTER columnName;
// > ALTER TABLE tableName MODIFY columnName varchar(255), CHANGE columnName newColumnName int(11);

// to change the character set for table to utf8 or latin1
// > ALTER TBALE tableName CONVERT TO CHARACTER SET utf8;
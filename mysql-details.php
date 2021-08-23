<?php

/* 
 * MySQL: Relational Database Management System (RDBMS) : a system to manage a database
 * - Relational: a relations between the database's tables.
 * - MySQL Storage Engines: two types of it: transactional and non-transactional
 * 
 * - MySQL Storage Engines List:
 *  1- MyISAM: the original storage engine, doesn't support transactions, provides table-level locking, used most in web and data warehousing.
 *  
 *  2- InnoDB: is the most widely used with transacions support, an ACID compilant storage engine, supports row-level locking, crash recovery and multi-version concurrency control, and the only engine that provides foreign key referential integrity constraint.
 *  
 *  3- Memory: creates tables in memory, the fastest engine, provides table-level locking, doesn't support transactions, it's ideal for creating temporary tables or quick lookups, the data is lost when the database is resared.
 * 
 *  4- Blackhole.
 *  5- federated.
 * 
 * - DDL: Data Definition Language: which are mysql statements or queries used to defien and modify the structureof database schema or tables.
 * - DB schema: is the logical way of grouping the db components together like tables, views, stored procedures and other components.
 * - DDL Commands: CREATE, ALTER, TRUNCATE, DROP, COMMENT, and RENAME.
 * 
 * - Table restrictions:
 * 
 * - To start the mysql in comand line (after the installation):
 * - type mysql command and login with the username and password (in new line)
 * - if you want to connect to another server rather than localhost use -h
 * > mysql -u root -h server.name -p
 * 
 * DATABASE:
 * 
 * - to show databases:
 * > show databases;
 * 
 * - to show engines:
 * > show engines;
 * 
 * - to show character set:
 * > show character set;
 * 
 * - to show collation:
 * > show collation;
 * 
 * - to show warnings:
 * > show warnings;
 * 
 * - to show variables:
 * > show variables;
 * 
 * - to use a database:
 * > use company;
 * 
 * - to show tables:
 * > show tables;
 * 
 * - to show the defaults for the database you need:
 * > use information_schema;
 * > SELECT * FROM SCHEMATA;
 * or
 * > SELECT * FROM SCHEMATA\G;
 * 
 * - to create a database:
 * > CREATE DATABASE IF NOT EXISTS company CHARACTER SET = utf8 COLLATE = utf8_general_ci;
 * 
 * - to change db specs:
 * > ALTER DATABASE company CHARACTER SET = utf8 COLLATE = utf8_general_ci;
 * 
 * - to reset the db specs to the defaults (IT'S NOT WORKING IN MYSQL 8):
 * > ALTER DATABASE company CHARACTER SET DEFAULT COLLATE DEFAULT;
 * 
 * - to drop db:
 * > DROP DATABASE IF EXISTS company;
 * 
 * TABLES:
 * 
 * - https://dev.mysql.com/doc/refman/8.0/en/create-table.html
 * - create table, add column attributes and constraints:
 * - UNSIGNED: means no negative values.
 * > CREATE TABLE IF NOT EXISTS table_name (column_name atrributes constraints);
 * > CREATE TABLE employees (
    -> emp_id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    -> dob DATE NOT NULL,
    -> address VARCHAR(50) NOT NULL,
    -> salary DECIMAL(7,2) DEFAULT 1500.00,
    -> gander ENUM('Male', 'Female') NOT NULL DEFAULT 'Male',
    -> position VARCHAR(20) NOT NULL,
    -> serial_number CHAR(30) NOT NULL);
 * 
 * - create table like another table with the same structure:
 * > CREATE TABLE IF NOT EXISTS table_name LIKE table2_name;
 * 
 * - create table with the same structure and data from another table:
 * > CREATE TABLE table_name SELECT * FROM database.table_name;
 * 
 * - to change table's options:
 * > ALTER TABLE emp_reports_min CHARACTER SET latin1 ENGINE MyISAM;
 * 
 * - to describe the table structure:
 * > DESCRIBE employees;
 * 
 * - to know how was the table created:
 * > SHOW CREATE TABLE employees;
 * 
 * - rename table:
 * > RENAME TABLE table_name old_table_name TO new_table_name;
 * 
 * - empty table from data - in some cases you won't be able to do this with a foreign key constraints:
 * > TRUNCATE TABLE table_name;
 * 
 * - to delete table:
 * > DROP TABLE table_name;
 * 
 * COLUMNS:
 * 
 * - Adding a new column, using FIRST or AFTER to position the column or left blank to add it in the end:
 * > ALTER TABLE employees ADD COLUMN phone VARCHAR(12) AFTER address;
 * 
 * - rename column:
 * > ALTER TABLE table_name RENAME COLUMN old_column_name TO new_column_name;
 * 
 * - modify existing column's data type or attributes:
 * > ALTER TABLE employees MODIFY position VARCHAR(15) NOT NULL;
 * 
 * - change existing column by deleting it and add a new one instead:
 * > ALTER TABLE employees CHANGE COLUMN code sec_code CHAR(30) NOT NULL;
 * 
 * - deleting column:
 * > ALTER TABLE employees DROP COLUMN dummy;
 * 
 * 
 */


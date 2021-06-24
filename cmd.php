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

/************************************************************** */

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

/************************************************************** */

// to add a constraint not null to an existing or new column
// > ALTER TBALE tableName MODIFY columnName varchar(255) NOT NULL;
// > ALTER TBALE tableName ADD columnName varchar(255) NOT NULL;

// to add or remove a constraint unique to column
// ALTER TABLE tableName ADD UNIQUE(columnName);
// ALTER TABLE tableName DROP INDEX columnName;

// to add or remove a primary key to column
// >  CREATE TABLE IF NOT EXISTS tableName (id int(11), name varchar(255), email varchar(255), PRIMARY KEY(id));
// ALTER TABLE tableName ADD PRIMARY KEY (columnName);
// ALTER TABLE tableName DROP PRIMARY KEY;

// to know the indexes in table
// > show indexes from tableName;

// to add a foreign key
// >  CREATE TABLE IF NOT EXISTS orders (
//     order_id int(11),
//     client_id int(11) not null,
//     PRIMARY KEY(order_id),
//     FOREIGN KEY(client_id) REFERENCES clients(id)
// ) ENGINE = innoDB;

// to add constraint name and on update and delete
// >  ALTER TABLE orders
//     ADD CONSTRAINT ordering
//     FOREIGN KEY(client_id) REFERENCES clients(id)
//     ON UPDATE CASCADE
//     ON DELETE CASCADE; // SET NULL || NO ACTION || RESTRICT

// to add many to many relation
// > CREATE TABLE shopmember (
//     client int not null,
//     shop int not null,
//     primary key (client, shop),
//     CONSTRAINT cons_clients FOREIGN KEY (client) REFERENCES clients (id) ON DELETE CASCADE ON UPDATE CASCADE,
//     CONSTRAINT cons_shop FOREIGN KEY (shop) REFERENCES clients (shop_id) ON DELETE CASCADE ON UPDATE CASCADE,
// ) ENGINE = innoDB;

/************************************************************** */

// to select the first 3 characters in a string from a column
// > SELECT LEFT(columnName, 3) FROM tableName;

// to select the first or the last 3 characters from a column
// > SELECT LEFT(columnName, 3) FROM tableName;
// > SELECT RIGHT(columnName, 3) FROM tableName;

// to select a string from the middle of the column, the position is 1 based index
// > MID(columnName, position, length);
// > SELECT MID(columnName, 2, 3);

// to know the length of string
// > SELECT LENGTH(columnName) AS aliasName FROM tableName; // counting the bytes of characters
// > SELECT CHAR_LENGTH(columnName) AS aliasName FROM tableName; // counting the number of characters

// to transform a string cases
// > LOWER(columnName);
// > LCASE(columnName);
// > UPPER(columnName);
// > UCASE(columnName);

// ordering asc desc
// SELECT columnName AS aliasName FROM tableName ORDER BY CHAR_LENGTH(columnName) ASC;
// SELECT columnName AS aliasName FROM tableName ORDER BY CHAR_LENGTH(columnName) DESC;

// Repeat string 3 times
// > SELECT text, REPEAT(columnName, 3) AS aliasName FROM tableName;

// Replace string 
// > SELECT text, REPLACE(columnName, 'a', '@') AS aliasName FROM tableName;
// > UPDATE tableName SET columnName = REPLACE(columnName, 'a', '@');

// Reverse string
// > SELECT text, REVERSE(columnName) AS aliasName FROM tableName;

// concatenation
// > CONCATE('First ', columnName, ' last')

// concatenation with seperator
// > CONCATE_WS(',', columnName, ' last')
// > CONCATE_WS(',', CONCATE(' ', columnName), ' last')

// to insert a string in column instead of another
// INSERT (columnName, position, length, 'string');

// trim text with trim()
// > TRIM(LEADING | TRAILING | BOTH [Remove String] FROM [columnName]);
// >> if the methods didn't be specified the 'both' will be used
// >> the removed string if not written, the space will be removed
// > TRIM(LEADING '@' FROM email);

// trim spaces only from left or right
// LTRIM(columnName);
// RTRIM(columnName);

// adding padding string in the column string
// LPAD(columnName, length, paddedString);
// RPAD(columnName, length, paddedString);
// > LPAD(columnName, 5, '@');
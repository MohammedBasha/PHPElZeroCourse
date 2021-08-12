<?php

/* Super global variables:
 * - Associative arrays.
 * - These variables are case-sensitive unlike the functions that are case-insensitive
 * 
 * $_GET:
 * - It's having the query parameters (?a=1&b=2) in any url https://www.abc.com/?a=1&b=2
 * - it's used to transfere data between pages as the web is stateless not stateful - read below:
 * - https://en.wikipedia.org/wiki/Stateless_protocol
 * - https://stackoverflow.com/questions/2680380/meaning-of-web-is-stateless-and-http-is-statless-protocol
 * - Enables you to control the application.
 * 
 * REMEMBER: STOP REFACTORING CODE WITH MANY FUNCTION CALLS
 * 
 * $_POST: It's the data sent to server with post method
 * - https://www.php.net/manual/en/book.filter.php
 * - https://www.php.net/manual/en/book.ctype.php
 * - firefoxegy@gmail.com
 * 
 * $_REQUEST:
 * 
 * $_SESSION: a way to create a stateful application
 * - you can put any content in the session even objects but not resources
 * - because a serialization is done to all the data
 * 
 * $_COOKIE:
 * 
 * $_SERVER:
 * 
 * $_FILES:
 * 
 * $_ENV:
 * 
 */
session_start();
echo sys_get_temp_dir() . '<br>'; // This prints the system temporary directory
echo session_save_path() . '<br>'; // This prints the saved session's directory
echo session_id() . '<br>'; // This prints the session ID
echo 'sess_' . session_id() . '<br>'; // This prints the session file
$_SESSION['welcome'] = 'Welcome to our website ';
var_dump($_SESSION);
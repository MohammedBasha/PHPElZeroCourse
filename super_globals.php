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
 * - sent tasks to Mohammed at firefoxegy@gmail.com
 * 
 * $_REQUEST:
 * 
 * $_SESSION: a way to create a stateful application
 * - you can put any content in the session even objects but not resources
 * - because a serialization is done to all the data
 * - https://www.php.net/manual/en/book.session
 * - SESSION LOCKING: session locking means that the session is not available for all files for reading and writing - we use session_write_close() with that and the explaination in session.php file.
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

//require './session.php';
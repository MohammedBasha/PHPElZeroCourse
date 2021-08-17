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
 * $_SESSION: a way to create a stateful application
 * - you can put any content in the session even objects but not resources
 * - because a serialization is done to all the data
 * - https://www.php.net/manual/en/book.session
 *
 * - SESSION LOCKING:
 * - Read on that in the last Note in this link below:
 * - https://www.php.net/manual/en/session.examples.basic.php
 * - https://www.php.net/manual/en/function.session-write-close.php
 * 
 * - HEADERS ALREADY SENT problem:
 * - If there is a space, new line before the starting PHP tags ( <?php) or BOM.
 * - https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
 * - https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php/8028979#8028979
 * 
 * $_REQUEST: go to request.php file
 * - An array can access some data that could be in the $_GET or $_POST
 * 
 * $_SERVER:
 * - https://www.php.net/manual/en/reserved.variables.server
 * - http://www.faqs.org/rfcs/rfc3875.html
 * 
 * $_COOKIE: go to cookie.php file
 * 
 * $_ENV: Environment variables
 * 
 * $_FILES:
 * 
 */
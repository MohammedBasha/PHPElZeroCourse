<?php

/* - https://www.oreilly.com/library/view/mastering-regular-expressions/0596528124/
 * - https://www.php.net/manual/en/book.pcre.php
 * - https://rexegg.com/regex-quantifiers.html
 * - https://www.regular-expressions.info/
 * 
 * PHP depend on two kinds of regular expressions:
 * 1- PCRE: Perl compatible regular expressions (built-in).
 * 2- POSIX Regular Expressions.
 * 
 * - How to use regular expressions to match a string in another string?
 * By using these patterns
 * Literal Characters pattern: characters are used to search for a string.
 * Meta characters pattern: \ . * + - { } [ ] ^ $ | ? ( ) : ! =
 * 
 * - Delimeters: the symbols that the pattern is put inside it like // or ##.
 * 
 */

// Literal Characters Pattern
//$pattern = '/man /';
//$str = 'The man went to his home early, then man tokk a bus, then man sleeps, man';
//preg_match($pattern, $str, $match); // it returns the first match only
//preg_match_all($pattern, $str, $match); // returns all the matchs
//var_dump($match);

// Meta Characters Pattern
// Wild Card . : means any 1 character except a new line
//$pattern = '/h.t/';
//$pattern = '/h..t/';
//$str = 'Hot hot hat hit haaaaat h$t h1t h.t ht haat';
//preg_match_all($pattern, $str, $match); // returns all the matchs
//var_dump($match);

//$pattern = '/1.3/';
//$pattern = '/1\.3/'; // by escaping the . wild card it will be treated as a floated number
//$str = '1.3 113 1-3 1@3';
//preg_match_all($pattern, $str, $match); // returns all the matchs
//var_dump($match);

// Other meta character like:
// tab: \t
// line return: \r \n \r\n
// non-printable: \a fro bell and \v for vertical tab


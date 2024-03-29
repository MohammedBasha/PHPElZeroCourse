<?php

/* - https://www.php.net/manual/en/book.pcre.php
 * - https://www.oreilly.com/library/view/mastering-regular-expressions/0596528124/
 * - https://rexegg.com/regex-quantifiers.html
 * - https://www.regular-expressions.info/
 * 
 * For testing Regular expressions:
 * - https://regex101.com/
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
 * Character Sets:
 * 
 * Characters Ranges:
 * 
 * Negation Meta Character - Negative Character Sets
 * 
 * Character Classes:
 * - \d : look for any digit like [0-9]
 * - \w : look for any alphanumeric character or underscore _ like [a-zA-Z0-9_]
 * - \s : look for any whitespace like [ \t\r\n]
 * - \D : look for any non-digit character [^0-9]
 * - \W : look for any non-alphanumeric character or underscore _ [^a-zA-Z0-9_]
 * - \S : look for any non-whitespace like [^ \t\r\n]
 * - \b : word boundary
 * - \x : unicode characters
 * 
 * Repetition Meta Characters:
 * Multiply Character * : the preceding item can be repeated zero or more times
 * Plus Character + : the preceding item can be repeated one or more times
 * Question Mark Character ? : the preceding item can be repeated Zero or one time
 * 
 * Quantified repetition: {min,max} or {min,} or {min}
 * 
 * Modes: Greedy and Lazy
 * - https://www.regular-expressions.info/repeat.html
 * - https://www.rexegg.com/regex-quantifiers.html
 * 
 * Capturing Group: searching for all the characters found between (abc) (\w+)
 * 
 * Alternation: searching for all the grouped characters found between those alternatives (abc|def)
 * 
 * Anchors: Zero character length
 * ^ : Starting negation character - used to except characters in searching [^ab]
 * $ : Ending negation character [ab$]
 * \A : The same as ^ but working only in sngle line mode
 * \Z : The same as $ but working only in sngle line mode
 * \b : word boundries - applied for word characters
 * \B : non word boundries - applied for non word characters 
 * 
 * Modifiers:
 * - https://www.php.net/manual/en/reference.pcre.pattern.modifiers.php
 * g : global in the whole string
 * i : case-insensitive
 * m : multiline
 * 
 * Backreferences: 
 * 
 * Non caputring group: <(?:h1|em)>[a-zA-Z ]+<\/(?:h1|em)>
 * 
 * Find and replace: 
 * 
 * Look-around assertions: working in capturing group
 * - Lookahead assertions: /str(?=ing|ategy)/ 
 *  - This ?= means positive lookahead
 *  - This ?! means negative lookahead
 * - Lookbehind assertions: (?<=text)
 *  - This ?<= means positive lookbehind
 *  - This ?<! means negative lookbehind
 * 
 * Unicode characters: the symbol in any language is represented as a single byte or multibyte
 * - if we want to search for café : caf(e|\x{00E9})
 * - https://unicode-table.com/en/
 * - https://www.php.net/manual/en/regexp.reference.unicode.php
 * 
 * PCRE functions in PHP:
 * - preg_match() : performs single match
 * - preg_match_all() : performs global matches
 * - preg_replace() : performs search and replace
 * - preg_split() : performs splitting string
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

// Character Sets
//$pattern = '/fl[o#a\]]t/'; // getting 1 character of the characters found between those []
//$str = 'My flat rent is some how high, Iam now floating and flot fl#t fl]t';
//preg_match_all($pattern, $str, $match); // returns all the matchs
//echo '<pre>';
//var_dump($match);
//echo '</pre>';

// Characters Ranges [a-z][A-Z][0-9]
//$pattern = '/fl[a-z]t/'; // getting 1 character in that range
//$str = 'My flat rent is some how high, Iam now floating and flot fl#t fl]t';
//preg_match_all($pattern, $str, $match); // returns all the matchs
//echo '<pre>';
//var_dump($match);
//echo '</pre>';

// Negation Meta Character (^)- Negative Character Sets
// Characters you don't want to be included in the search
//$pattern = '/fl[^aoi\]]t/';
//$str = 'My flat rent is some how high, Iam now floating and flot fl#t fl]t';
//preg_match_all($pattern, $str, $match); // returns all the matchs
//echo '<pre>';
//var_dump($match);
//echo '</pre>';

// Quantified repetition
//$pattern = '/9{2}/';
//$pattern = '/9{2,3}/';
//$str = 'I have 9999 Dollars'; // as it's greedy, it will return 999 over 99

//$pattern = '/\w+_\d{4}\.\w{3}/';
//$pattern = '/\w+?_\d{2,4}\.[a-z]{3,5}/'; // when using the ? it will be lazy mode
//$str = 'file07_2015.xls, doc04_2018.doc, document09_2020.pwt';
//preg_match_all($pattern, $str, $match); // returns all the matchs
//echo '<pre>';
//var_dump($match);
//echo '</pre>';

// Backreferences
//$pattern = '/<(\w{2})>.+<\/\1>/';
//$str = '<em>My name is mohammed</em>';

// Find and replace
//$pattern = '/(to) (have)/';
//$str = 'I to have go';
//$match = preg_replace($pattern, 'should $2 $1', $str);
//echo '<pre>';
//var_dump($match);
//echo '</pre>';

// PCRE functions in PHP
//$pattern = '/str(?:ing|ike|ategy|ive)/i';
$pattern = '/(str)(ing|ike|ategy|ive)/i';
$str = 'The following words start with str and followed by various characters: string, startegy, strike and strive';
//preg_match($pattern, $str, $match);
//preg_match_all($pattern, $str, $match);
//preg_match_all($pattern, $str, $matches, PREG_OFFSET_CAPTURE, 75);
//$matches = preg_replace($pattern, '$1-{$2}', $str);
echo '<pre>';
var_dump(preg_split($pattern, $str));
echo '</pre>';
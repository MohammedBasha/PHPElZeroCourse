<?php

//echo '<pre>';
//
//$sessionDir = dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'sessions';
//
//session_save_path($sessionDir); // changed the save sessions temporary path (after you give read and write permissions to the new directory) - you must put the saved path on every page you're working on
//
//session_start();
//
//echo sys_get_temp_dir() . '<br>'; // This prints the system temporary directory
//
//echo session_id() . '<br>'; // This prints the session ID
//
//echo 'sess_' . session_id() . '<br>'; // This prints the session file
//
//$_SESSION['welcome'] = 'Welcome to our website ';
//
//echo $_SESSION['welcome'] . '<br>';
//
//var_dump(session_get_cookie_params()); // to get the cookie parameters
//
////session_set_cookie_params(); // to set the cookie parameters
//
////session_write_close(); // this used with the ajaxified applications that sent requests to sessions to close the session is used with a file to enable another file to use the same session after useing session_start() again
//
//echo '<br>';
//
//var_dump($_SESSION);
//
//echo '</pre>';

// in the Session 31, Mohammed used mcrypt for encrypting data
// I'll use Sodium library

//$msg = 'Welcome to our website!';
//
//// Generating an encryption key and a nonce
//$key   = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES); // 256 bit
//$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); // 24 bytes
//
//// Encrypt
//$ciphertext = sodium_crypto_secretbox($msg, $nonce, $key);
//
//// Decrypt
//$plaintext = sodium_crypto_secretbox_open($ciphertext, $nonce, $key);
//
//echo $plaintext === $msg ? 'Success' : 'Error';
<?php

// Defining a constant to the new saved path for the sessions
define('SESSION_SAVED_PATH', dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'sessions');

class AppSessionHandler extends SessionHandler
{
    private $sessionName = 'MYAPPSESS'; // Session Name
    private $sessionMaxLifeTime = 0; // Session Life Time
    private $sessionSSL = false; // Session Secure Connection
    private $sessionHTTPOnly = true; // Session HTTP
    private $sessionPath = '/'; // Session Path
    private $sessionDomain = '127.0.0.1'; // Session Domain
    private $sessionSavePath = SESSION_SAVED_PATH; // Session Saved Path
    private $sessionCipheredData;
    private $sessionPlainedData;
    
    private function sessionKeyBytes() { // returning Key Bytes
        return random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
    }
    
    private function sessionNonceBytes() { // returning Nonce Bytes
        return random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    }
    
    private function cipherData($data) { // Encryoting the text
        $this->sessionCipheredData = sodium_crypto_secretbox(
                    $data,
                    $this->sessionNonceBytes(),
                    $this->sessionKeyBytes()
                    );
        return $this->sessionCipheredData;
    }
    
    private function plainData() { // Decrypting the text
        $this->sessionPlainedData = sodium_crypto_secretbox_open(
                    $this->sessionCipheredData,
                    $this->sessionNonceBytes(),
                    $this->sessionKeyBytes()
                    );
        return $this->sessionPlainedData;
    }
    
    public function __construct() {
        // Starting the instantiation by resetting these runtime configurations
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', 'files');
        
        session_name($this->sessionName);
        session_save_path($this->sessionSavePath);
        session_set_cookie_params(
                $this->sessionMaxLifeTime,
                $this->sessionPath,
                $this->sessionDomain,
                $this->sessionSSL,
                $this->sessionHTTPOnly
        );
        
        session_set_save_handler($this, true); // Setting user-level session storage methods from this class
    }
    
    public function __get($key) {
        return !empty($_SESSION[$key])? $_SESSION[$key] : false;
    }
    
    public function __set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public function __isset($key) {
        return isset($_SESSION[$key])? true : false;
    }
    
    public function read($id) { // Reading the plained text
        if (is_null(parent::read($id))) return $this->plainData();
        return parent::read($id);
    }
    
    public function write($id, $data) { // writing ciphered text
        return parent::write($id, $this->cipherData($data));
    }
    
    public function start() {
        if ('' === session_id()) {
            if (session_start()) {
                if (!isset($this->sessionStartTime)) {
                    $this->sessionStartTime = time();
                }
            }
        }
    }
}

$session = new AppSessionHandler();

$session->start();
//$session->msg = 'Welcome to our website';
var_dump($_SESSION);
echo $session->msg;
echo isset($session->msg)? 'found' : 'not';
echo $session->sessionStartTime;
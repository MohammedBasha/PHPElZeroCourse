<?php

// This custom session handler is based on Example #1 in the page below:
// https://www.php.net/manual/en/class.sessionhandler.php

// Defining a constant to the new saved path for the sessions
define('SESSION_SAVE_PATH', dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'sessions');

class AppSessionHandler extends SessionHandler
{
    private $sessionName = 'MYAPPSESS'; // Custom Session Name
    private $sessionMaxLifeTime = 0; // Session Life Time
    private $sessionSSL = false; // Session Secure Connection
    private $sessionHTTPOnly = true; // Session HTTP
    private $sessionPath = '/'; // Session Path
    private $sessionDomain = '127.0.0.1'; // Session Domain
    private $sessionSavePath = SESSION_SAVE_PATH; // Session Saved Path

    private $sessionCipherKey = 'WYCRYPT0K3Y@2016';

    private $ttl = 30; // Minutes

    public function __construct() {
        // Starting the instantiation by resetting these runtime configurations
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', 'files');

        session_name($this->sessionName); // Changing the default name

        // Changing the default save path
        session_save_path($this->sessionSavePath);

        // Setting the cookie parameters
        session_set_cookie_params(
                $this->sessionMaxLifeTime,
                $this->sessionPath,
                $this->sessionDomain,
                $this->sessionSSL,
                $this->sessionHTTPOnly
        );

        // Setting the user-level session storage methods from this class
        session_set_save_handler($this, true);
    }

    // Checking if there's a key in _SESSION to return
    public function __get($key) {
        return false !== $_SESSION[$key]? $_SESSION[$key] : false;
    }

    // Setting a key and its value in _SESSION
    public function __set($key, $value) {
        return $_SESSION[$key] = $value;
    }

    // Checking if there's a key in _SESSION or not
    public function __isset($key) {
        return isset($_SESSION[$key])? true : false;
    }

    // Decrypting the Encrypted data
    private function decrypt($edata, $password) {
        // Decoding the encoded data with MIME base64
        $data = base64_decode($edata);

        // Extract the first 16 bytes of the given $data
        $salt = substr($data, 0, 16);

        // Extract the rest of of the given $data after the first 16 bytes
        $ct = substr($data, 16);

        $rounds = 3; // depends on key length

        // concatenating the $sessionCipherKey with the $salt data
        $data00 = $password.$salt;
        $hash = array();

        // Generate a hash value with sha256 algorithm
        $hash[0] = hash('sha256', $data00, true);
        $result = $hash[0];
        for ($i = 1; $i < $rounds; $i++) {
            // the hashed data will be a mix of the $data00 with the $hash array items
            $hash[$i] = hash('sha256', $hash[$i - 1].$data00, true);
            $result .= $hash[$i];
        }

        // Extract the first 32 bytes of the 48 bytes in $result variable to generate a passphrase for the openssl_decrypt() function
        $key = substr($result, 0, 32);

        // Extract the last 16 bytes of the 48 bytes in $result variable to generate the Initialization Vector
        $iv  = substr($result, 32,16);

        // Returning the decrypted data
        return openssl_decrypt($ct, 'AES-256-CBC', $key, true, $iv);
    }

    // Encrypting the data
    private function encrypt($data, $password) {
        // Set a random salt
        // Generate a pseudo-random string of 16 bytes
        $salt = openssl_random_pseudo_bytes(16);

        // These variables for the salting
        $salted = '';
        $dx = '';

        // Salt the key(32) and iv(16) = 48
        // checking if the length of the $salted key is less than 48 bytes
        while (strlen($salted) < 48) {
            // Generate a hash value with sha256 algorithm
            // the hashed data will be a mix of the $sessionCipherKey with the salting variables ($salted && $dx)
            $dx = hash('sha256', $dx.$password.$salt, true);
            $salted .= $dx;
        }

        // Extract the first 32 bytes of the 48 bytes in $salted variable to generate a passphrase for the openssl_encrypt() function
        $key = substr($salted, 0, 32);

        // Extract the last 16 bytes of the 48 bytes in $salted variable to generate the Initialization Vector
        $iv  = substr($salted, 32,16);

        $encrypted_data = openssl_encrypt($data, 'AES-256-CBC', $key, true, $iv);

        // Returning encoded data with MIME base64 with the 48 bytes $salt string after encryption
        return base64_encode($salt . $encrypted_data);
    }

    // Reading the decrypted data
    public function read($id)
    {
        $data = parent::read($id);

        if (!$data) {
            return ""; // Returning Empty String if the session not found
        } else {
            // Returning  the decrypted session
            return $this->decrypt($data, $this->sessionCipherKey);
        }
    }

    // Writing the encrypted data
    public function write($id, $data)
    {
        // Writing encrypted session
        $data = $this->encrypt($data, $this->sessionCipherKey);

        return parent::write($id, $data);
    }

    // Start the session, save the start time and then check the Validity
    public function start() {
        if ('' === session_id()) {
            if (session_start()) {
                $this->sessionStartTime();
                $this->checkSessionValidity();
            }
        }
    }

    // create a key in the _SESSION to save the start time
    private function sessionStartTime() {
        if (!isset($this->sessionStartTime)) {
            $this->sessionStartTime = time();
        }
        return true;
    }

    // Checking the session's time-to-live in Seconds, if it exceeded, then renew the session with new ID
    private function checkSessionValidity() {
        if ((time() - $this->sessionStartTime) > ($this->ttl * 60)) {
            $this->renewSession(); // calling the renew session method
            $this->generateFingerPrint(); // calling the generate finger print method
        }
        return true;
    }

    // Renew the starting time of the session and regenerate a new session ID
    private function renewSession() {
        $this->sessionStartTime = time();
        return session_regenerate_id(true);
    }
    
    // Kill the session and cookie
    public function kill() {
        session_unset();
        
        // Reset the cookie with en empty value
        setcookie(
            $this->sessionName,
            '',
            time() - 1000,
            $this->sessionPath,
            $this->sessionDomain,
            $this->sessionSSL,
            $this->sessionHTTPOnly
        );
        
        session_destroy();
    }
    
    // Create a hashed finger print
    private function generateFingerPrint() {
        $userAgentID = $_SERVER['HTTP_USER_AGENT'];
        $this->userCipherKey = openssl_random_pseudo_bytes(32);
        $sessionID = session_id();
        $this->fingerPrint = hash(
            'sha256',
            $userAgentID . $this->userCipherKey . $sessionID,
            true
        );
    }
    
    // Checking if the user who is using this session is the same user everytime
    public function isValidFingerPrint() {
        // Checking if there's not a finger print for the use, then create hashed one
        if (!isset($this->fingerPrint)) {
            $this->generateFingerPrint();
        }
        
        // create a finger print for this user
        $fingerPrint = hash(
            'sha256',
            $_SERVER['HTTP_USER_AGENT'] . $this->userCipherKey . session_id(),
            true
        );
        
        // Compare this finger print with the stored one to check the user
        if ($fingerPrint === $this->fingerPrint) return true;
        return false;
    }
}

$session = new AppSessionHandler();
$session->start();
if (!$session->isValidFingerPrint()) {
    $session->kill();
}
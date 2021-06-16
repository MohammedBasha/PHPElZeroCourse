<?php

session_start();

if (isset($_SESSION['userName'])) {

    echo 'Hello ' . $_SESSION['userName'] . ' you\'re in the Control Panel Area.';

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

} else {
    echo 'Error: You can\'t browse this page directly without Logging.';
}
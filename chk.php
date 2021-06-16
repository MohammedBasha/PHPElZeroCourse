<?php

session_start();

$admins = ['Ahmed', 'Ali', 'Mansour', 'Ramez'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $userName = $_POST['username'];

    if (in_array($userName, $admins)) {

        $_SESSION['userName'] = $userName;

        echo 'Hello ' . $_SESSION['userName'] . ' you\'ll be directed to the Control Panel.';

        header('REFRESH:3;URL=control.php');
    } else {
        echo 'Error: You\'re not allowd to be here.';
    }
} else {
    echo 'Error: You can\'t browse this page directly without Logging.';
}
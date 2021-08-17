<?php

if (!isset($_COOKIE['barcolor'])) {
    setcookie('barcolor', '#f1f1f1', time() + 60 * 60 * 24 * 3, '/', '127.0.0.1', false, true);
}
var_dump($_COOKIE);
<?php
define('MAINTENANCE', 0);
//echo $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

define('IP_CLIENT', $ip);


$serveur='dev';

if($serveur=='dev'){

    //db config
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'db_game');
    define('DB_USER', 'wwwhat');
    define('DB_PASS', 'QulTe5HiG8dNIzzTPva7');
}


define('PROJET_NAME', 'Game');


?>

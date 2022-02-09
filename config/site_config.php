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
    define('WWW_ROOT_FRONT', 'D:/Dropbox/DOUBLEYOUPROD/website/admin.game.fr/webroot/');
}


if($serveur=='preprod') {
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'cp260053p04_game');
    define('DB_USER', 'cp260053p04_game');
    define('DB_PASS', 'Hefpccy$08$08');
    define('WWW_ROOT_FRONT', '/home/cp260053p04/public_html/game/webroot');

}



define('PROJET_NAME', 'Game');


?>

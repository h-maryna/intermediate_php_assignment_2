<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

/*
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DSN', 'mysql:host=localhost;dbname=assignment');*/


define('DB_USER', 'web_user');
define('DB_PASS', 'Studies_2018');
define('DB_DSN', 'mysql:host=localhost;dbname=php_capstone');

$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

define('DB_USER', 'wdd2');
define('DB_PASS', 'hgf43');
define('DB_DSN', 'mysql:host=localhost;dbname=wdd2_intro_as2');

$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



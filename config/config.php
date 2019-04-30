<?php

session_start();

// buffer overflow to prevent showing HTML
ob_start();

// SEt a session CSRF token in token
// if empty session csrf token
if(empty($_SESSION['token'])){
   $_SESSION['token'] = md5(rand());
}
/*
if('POST' == filter_input(INPUT_SERVER, 'REQUEST_METHOD')){
	if($_SESSION['token'] != filter_input(INPUT_POST, 'token')){
		die('CSRF token mismatch');
	}
} */
// Step 2

// Output this token to your form into a hidden field
// if this is a post request 
// ensure there is a csrf_token field
// and make sure it equals the one we
// have in session
//   if not die()
$environment = 'dev'; // prod or dev

if('dev' == $environment){
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
} else {
	ini_set('display_errors', 0);
}

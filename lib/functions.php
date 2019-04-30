<?php

/**
 * Escape string for general use in HTML
 * @param  String $string data to be sanitized
 * @return String
 */
function e($string) {
	return htmlentities($string, null, 'UTF-8');
}

/**
 * Escape string for use in attribute (quotes entitized)
 * @param  String $string data to be sanitized
 * @return String 
 */
function e_attr($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function clean($field) {
	if(!empty($_POST[$field])) {
		return htmlentities($_POST[$field], ENT_QUOTES, "UTF-8");
	} else {
		return '';
	}
}

function getToken()
{
	return $_SESSION['token'];
} 

/**
 * [dd description]
 * @param  [type] $var [description]
 * @return [type]      [description]
 */
function dd($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}

function setFlash($type, $message)
{
	$_SESSION['message'] = [$type, $message];
}
<?php

// Classes should be created one per file
// The file name for classesss should be identical to the class name
// eg: thois class should be saved in saved in a file call Validator.php
// 
// Validator should do:
// 
// 1. Validate any type of data
// 
// 2. Track our errors
// 
// 3. Give us the errors when we ask for them

class Validator
{   

	/**
	 * 	Collection of validation errors
	 * @var array
	 */
	private $errors = [];

    public function required($field){
    	if(!filter_input(INPUT_POST, $field)){
        $this->setError($field, $field .' is a required field');
    	}
    }
    
    //filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);
    //// filter\_input is now considered best practice for accerting
    // Superglobals 
    public function email($field){
    	if(!filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL)) {
        $this->setError($field, 'Please provide a valid email address');
        }
    } 
       /**
         * Ensure a value is provided for required field
         * @param string $field the field name
         * @return void
         */
    public function errors()
    	{
    		return $this->errors;
    }
        /**
         * 	Set error message if a message has not alread
         * 	been set for a field
         * 	@param  String $field the field to set the error for
         * 	@param  String $message the message
         * 	         
        */
       
    private function setError($field, $message){
    	if(empty($this->errors[$field])){
         $this->errors[$field] = $message;
        }
    }

    public function string($field){
        $string = filter_input(INPUT_POST, $field);
        $pattern = '/[a-zA-Z]{4,}/';
        if(!preg_match($pattern, $string)){
            $this->setError($field, 'Please provide a valid' . ' ' . $field);
        } 
    } 

    public function integer($field){
        $integer = filter_input(INPUT_POST, $field);
        $pattern = '/[1-9][0-9]{1,}+/';
        if(!preg_match($pattern, $integer)){
            $this->setError($field, 'Please enter proper ' . ' ' . $field);
        } 
    } 

    public function postal_code($field){
        $postal_code = filter_input(INPUT_POST, $field);
        $pattern = '/[A-Z][0-9][A-Z][0-9][A-Z][0-9]/';
        if(!preg_match($pattern, $postal_code)){
            $this->setError($field, 'Please provide a valid Canadian postal code');
        } 
    } 

    public function password($field){
        $password = filter_input(INPUT_POST, $field);
        //pattern = '/(?=.*[A-Z]+[$%^&@#!+-~]+[A-Z]{2}[a-zA-Z]+[0-9]!)/'; //Myp@SSword3!
        $pattern = '/[A-z]{6}/'; // for testing
        if(!preg_match($pattern, $password)){
            $this->setError($field, 'Please provide a proper password');
        } 
    } 

}


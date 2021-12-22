<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArrayFlatten {
	public function __construct(){
        
    }

   	function array_flatten($array) {
	  	if (!is_array($array)) { 
	    	return FALSE; 
	  	} 
	  	$result = array(); 
	  	foreach ($array as $key => $value) { 
	    	if (is_array($value)) { 
	      		$result = array_merge($result, $this->array_flatten($value)); 
	    	} 
	    	else { 
	      		$result[] = $value; 
	    	} 
	  	} 
	  	return $result; 
	} 
}
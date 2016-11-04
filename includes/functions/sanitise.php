<?php
function escapeOutput($string){
	//String, double and single quotes,character encoding
	return htmlentities($string,ENT_QUOTES,'UTF-8');
}

function checkString($string) {
	
	$msg = "";
	if (empty($string)){
		$msg .="- Error:String must not be empty";
	}
	else if(strlen($string) <= 2)
	{
		$msg = "You words must be > 2";
	}
	else if(!preg_match("/^[a-zA-Z ]/",$string)) {
		$msg = "-Error. String must contain alphabetical characters only";
	}
      //Other tests here
	
	
	if (empty($msg)){
		$msg = "Valid string";
	}
	return $msg;
}


?>
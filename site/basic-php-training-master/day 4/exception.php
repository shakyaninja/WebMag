<?php 
	// Exception Handling 
		// methods 
			// Basic use of exception 
			// Custom exception hadler create 
			// Multiple Exception 
			// Re throwin exception 


	// try 
	// catch

	// try{
	// 	echo "string";
	// 	throw new Exception("Exception thron");
	// 	echo "string";
	// 	//your code goes here...
	// }catch(Exception $e){
	// 	echo $e->getMessage();
	// 	echo "<br>";
	// 	echo $e->getFile();
	// 	echo "<br>";

	// 	echo $e->getLine();
	// }

	
	class CustomException extends Exception{
		function message(){
			return "CustomException ( ".Date('Y/m/d h:i:s')."): in line no. ".$this->getLine()." in page '".$this->getFile()."': <strong>".$this->getMessage()."</strong>"."\r\n";
		}
	}


	try{
		$a = 1;
		if ($a) {
			throw new CustomException("This is Custome Exception");
		}
	}catch(CustomException $e){
		error_log($e->message(),3,'error.log');
	}
<!-- <?php 
	
	include 'class/Car.php';
	include 'class/Student.php';

	function getClass($class){
		include 'class/'.$class.'.php';
	}
	// spl register function automatilly call // standar php library

	spl_autoload_register('getClass');

	$obj = new Student();
	print_r($obj);
	 -->
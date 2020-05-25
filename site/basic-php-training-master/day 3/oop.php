<?php 
	function debugger($data,$is_die=false){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if ($is_die) {
			exit();
		}
	}
	// class ClassName{
	// 	// function __destruct(){
	// 	// 	echo "<br>";
	// 	// 	echo "I am destructr=or function";
	// 	// }

	// 	function __construct($name,$college="Khwopa "){
	// 		echo "My name is ".$name;
	// 	}
	// }
	// $obj = new ClassName('Niranjan');



	// class ClassName{
	// 	// function __destruct(){
	// 	// 	echo "<br>";
	// 	// 	echo "I am destructr=or function";
	// 	// }

	// 	function __construct($name,$college="Khwopa "){
	// 		echo "My name is ".$name;
	// 	}
	// 	function testFunction(){
	// 		echo "<br>";
	// 		echo "I am test function";
	// 	}
	// }
	// $obj = new ClassName('Niranjan');
	// // double arrow operator,  single arrow operator
	// // =>, ->  
	// $obj->testFunction();



	// class ClassName{
		
	// 	function testFunction(){
	// 		echo "<br>";
	// 		echo "I am test function";
	// 	}
	// }

	// class ClassName1{
	// 	// 
	// 	function testFunction(){
	// 		echo "<br>";
	// 		echo "I am test function in class 1";
	// 	}
	// }
	// $obj = new ClassName('Niranjan');
	
	// $obj->testFunction();


	// Visibility model, Access Specifier

		// Public obj, derived class, class
		// Protected derived class, class 
		// private class

	// access Specifier for function 
	// function test(){
	// 	echo "string";
	// }

	// class Car{
	// 	private function test(){
	// 		echo "I am test function";
	// 	}
	// 	function __construct(){
	// 		$this->test();
	// 	}

	// 	function test1(){
	// 		$this->test();
	// 	}
	// }

	// $obj = new Car();

	// $obj2 = new Car();

	// $obj->test1();

	// $obj2->test1();

	// $obj->test();


	// access specifier for variable 
	
	// class Student{
	// 	public $name='Niranjan'; 
	// 	private $college='Khwopa college';
	// 	private $address='Liwali';

	// 	//getter setter function

	// 	function getCollege(){
	// 		return $this->college;
	// 	}

	// 	// setter function  
	// 	function setCollege($college){
	// 		$this->college = $college;
	// 	}
	// }

	// $obj = new Student();
	// echo $obj->name;
	// // echo $obj->college;
	// // echo $obj->address;
	// debugger($obj);

	// echo $obj->getCollege();
	// $obj->setCollege('Khwopa COllege of Engineering');
	// debugger($obj);


	// class Student{
	// 	function __construct($name="Niranjan",$college="Khwopa college of Engineering"){
	// 		$this->name = $name;
	// 		$this->college=$college;
	// 	}
	// }

	// $obj = new Student();
	// debugger($obj);



	// class Student{
	// 	public $name= "Rita";
	// 	public $college="Khwopa";

	// 	function test($name){
	// 		$this->name=$name;
	// 	}
	// }

	// $obj = new Student();
	// debugger($obj);

	// $obj1 = new Student();
	// $obj1->test('Gita');

	// debugger($obj1);
	

	class Car{
		// const WHEEL = 4; //class property
		// public $d = 3; //obj property

		function getWheel(){
			echo "string";
		}

		function __construct(){
			self::getWheel();
		}
	}

	$obj = new Car();

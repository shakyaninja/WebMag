<?php 
	// Loop 
	 	// while 
	 	// do while 
	 	// for loop 
	//  	// for each loop 
	// $x = 0;
	// while ($x <= 10) {
	// 	echo $x;
	// 	echo "<br>";
	// 	$x++;
	// }

	// echo "<br>";

	// $x = 0;
	// do {
	// 	# code...
	// 	echo $x;
	// 	echo "<br>";
	// 	$x++;
	// } while ($x < 10);

	// for ($i=0; $i < 10; $i++) { 
	// 	echo $i;
	// }

	// foreach ($variable as $key => $value) {
	// 	# code...
	// }
	

	// php function 
		
		// syntax: 
			// function FunctionName(){
			// 	echo "string";	
			// }

			// types of function: 
			// 1. BUilt ins 
			// 2. user defined 


			// Built ins 
			//  max()
			//  min()
			//  abs()


			// user defined function 

			// FunctionName();


			// arguemtn

				// function printName($name,$address){
				// 	echo "My name is ".$name.". I lve in ".$address;
				// }

				// printName('Niranjan');

	// php Array 

		
		// $ar = ['a','b','c'];
		// $ar = 1;
		// if (is_array($ar)) {
		// 	echo "this is array";
		// }else{
		// 	echo "this is not array";
		// }


		// $ar = array(1,3,4,5,6,7,34);


		// types of array

			// 1. indexed array 
			// 2. Associative array 
			// 3. Multidimensional Array 

		
		// indexed Array 

				// index, value pair
		// 	$car = array('volvo','BMW','Toyoto');
		// 	echo "<pre>";
		// 	print_r($car);
		// 	echo "</pre>";	

		// 	echo $car[2];

		// 	$car[3] = 'Car';
		// 	echo "<pre>";
		// 	print_r($car);
		// 	echo "</pre>";	


		// for ($i=0; $i < count($car); $i++) { 
		// 	echo $i.'=>'.$car[$i]."<br>";
		// }
		// 

		// $img_ext = ['jpg','png','tif'];
		// $ext = 'jpg';

		// if (in_array($ext, $img_ext)) {
		// 	echo "supported";
		// }else{
		// 	echo "not supported";
		// }

		// Associative Array 
				// key,value pair

		// $arr = array(
		// 				'key'=>"value",
		// 				'key1'=>'value1'
		// 			);
		
		// $arr['key4'] = 'Khwopa';

		// echo "<pre>";
		// print_r($arr);
		// echo "</pre>";

		// echo $arr['key'];

		// foreach ($arr as $key => $value) {
		// 	echo $key." has ".$value."<br>";
		// }


	// Multidimensional Array 
		// $mul_dim = array(
		// 				array(
		// 					'name'=>'Niranjan',
		// 					'address' => 'liwali'
		// 				),
		// 				array(
		// 					'name'=>'Khwopa',
		// 					'address' => 'liwali'
		// 				)
		// 			);

		// echo "<pre>";
		// print_r($mul_dim);
		// echo "</pre>";

		// echo $mul_dim[1]['name'];

	
	// Sorting arary 
		// $num = [1,4,2,7,4,7,4];
		// sort($num); //ascending order 
		// echo "<pre>";
		// print_r($num);
		// rsort($num); //descending order
		// print_r($num);

	

	// implode(glue, pieces)
	// explode(delimiter, string)
	// 

		// $girls = ['Gita','Sita','Rita'];
		// echo implode(", ", $girls);

	// $file = 'myimage.png';

	// echo "<pre>";
	// print_r(explode('.', $file));
	
	// ob_start();

	// @header('location: index.php');

	// filter 

	// $email = "abc13@gma@il.com";
	// echo filter_var($email,FILTER_VALIDATE_EMAIL);


	// FILTER_SANITIZE_STRING
	// FILTER_VALIDATE_URL
	// FILTER_SANITIZE_EMAIL


	// SUper Global Variable
		
		// Predefined Variable 
		// asscessible, regardless of scope 

		// $GLOBAL
		// $_REQUEST 
		
		// $_SERVER
		// $_POST 
		// $_GET 
		// $_FILES 

		// $_COOKIE 
		// $_SESSION 

	// Server ;

		// echo "<pre>";

		// print_r($_SERVER);


	// datetime 
		// Date(format,timestap)
	
		// echo Date("Y/m/d H:i:s a, y h M l D ");

		// d = 1 -31
		// m 1 -12 month 
		// Y 4 digit year 
		// y 2 digit yera 
		// M month name 
		// D sun , mon 

		// l SUnday monday 

		// H 01-24 
		// h 01-12
		// i min 
		// s sec 
		// a am/pm 

		// date_default_timezone_set('Asia/Katmandu');
		// echo Date("Y/m/d h:i:s a ");


		// mktime(hour,minut,sec,month,day,yer);
		// echo mktime(3,34,12,5,24,2010);

		// echo Date("Y/m/d h:i:s",mktime(3,34,12,5,24,2010));

		// 1970 jan 1 00:00:00

		// echo strtotime("10:30 pm April 15 2014");
		echo strtotime("yesterday")."<br>";
		echo Date("Y/m/d h:i:s",strtotime("next saturday"));


	

	

	


	
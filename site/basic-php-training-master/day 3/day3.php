<?php 
	function debugger($data,$is_die=false){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if ($is_die) {
			exit();
		}
	}


	// Session 
	// Superglobal Variable 

	// sessin variable storing user information aceesebile across multiple pages  

	// start session varible  

	// session_start();

	// // sesion set 
	// $_SESSION['AdminName'] = "Admin";
	// $_SESSION['token'] = "slkfjskdjlflksdjflksjfd";

	// debugger($_SESSION);


	// // SEssion get  
	// echo $_SESSION['AdminName'];

	// // session_unset();
	// debugger($_SESSION);

	// ob_start();
	// @header('location: session.php');




	// Cookies 

	// setcookie("__NAME__",'Bekoju Niranjan',time()-2000,'/');
	// debugger($_COOKIE);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
	<style>
		table,th,tr{
			border: 1px black solid;
		}
	</style>
</head>
<body>
		<?php 
			$ar = array(
						array('name'=>'Niranjan Bekoju','email'=> 'bekojunirnajan@gmail.com'),
						array('name'=>'Niranjan Bekoju','email'=> 'bekojunirnajan@gmail.com'),
						array('name'=>'Niranjan Bekoju','email'=> 'bekojunirnajan@gmail.com'),
						array('name'=>'Niranjan Bekoju','email'=> 'bekojunirnajan@gmail.com'),
						array('name'=>'Niranjan Bekoju','email'=> 'bekojunirnajan@gmail.com'),
						array('name'=>'Niranjan Bekoju','email'=> 'bekojunirnajan@gmail.com'),
						array('name'=>'Niranjan Bekoju','email'=> 'bekojunirnajan@gmail.com')
					);
			// debugger($ar);
		 ?>

		 <table>
		 	<!-- <thead>
		 		<th>S.N</th>
		 		<th>Username</th>
		 		<th>Email</th>
		 	</thead> -->

		 	<tbody>

		 		<?php 
		 			if (isset($ar) && !empty($ar)) {
		 				foreach ($ar as $key => $value) {
		 					break;
		 		?>
		 		<tr>
		 			<td><?php echo $key+1; ?></td>
		 			<td><?php echo $value['name']; ?></td>
		 			<td><?php echo $value['email']; ?></td>
		 		</tr>


		 		<?php
		 				}
		 			}
		 		?>
		 	</tbody>
		 </table>

</body>
</html>





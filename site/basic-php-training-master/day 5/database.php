<?php 
	// php 5 mysql 

	// php 7 mysqli i=> improved 
	// 	1. procedural 
	// 	2. Object Oriented 

	// PDO PHP DATA object 
	// 	1. Object Oriented 

	// data type 
	// 	int 
	// 	varchar 
	// 	text 
	// 	enum 
	// 	datetime 
	// 'mysql:host=localhost;dbname=khwopa'


//Data base Connection and Table Creation
	// try{
	// 	$servername = 'localhost';
	// 	$dbname = 'khwopa';
	// 	$username = 'root';
	// 	$password = '';

	// 	$sql = "
	// 			CREATE TABLE fruits(
	// 				id int not null PRIMARY KEY AUTO_INCREMENT,
	// 				fruitname varchar(20),
	// 				created_date datetime default current_timestamp,
	// 				updated_date datetime on update current_timestamp
	// 			)
	// 		";


	// 	$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
	// 	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //PDO::ERRMODE_SILENT | PDO::ERRMODE_WARNING |  PDO::ERRMODE_EXCEPTION
	// 	$conn->exec('SET NAMES UTF8');
	// 	echo "Database Connected Succesffuly";

	// 	$conn->exec($sql);

	// 	echo "<br>Fruits Table Created Succesffuly";
	// }catch(PDOException $e){
	// 	echo $e->getMessage();
	// }

// // Insert Data into Table
// 	try{
// 		$servername = 'localhost';
// 		$dbname = 'khwopa';
// 		$username = 'root';
// 		$password = '';

// 		$sql = "
// 				INSERT INTO fruits SET 
// 	 				fruitname = 'Grape'
// 			";


// 		$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
// 		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //PDO::ERRMODE_SILENT | PDO::ERRMODE_WARNING |  PDO::ERRMODE_EXCEPTION
// 		$conn->exec('SET NAMES UTF8');
// 		echo "Database Connected Succesffuly";

// 		$conn->exec($sql);
// 		echo "Data Inserted Succesffuly";

// 		echo "<br>";
// 		echo $conn->lastInsertId();

// 	}catch(PDOException $e){
// 		echo $e->getMessage();
// 	}



// Prepare Statement and bind parameter
	// 1. reduce parsing time 
	// 2. useful against sql injection 
	// 3. minimize band width

	// try{
	// 	$servername = 'localhost';
	// 	$dbname = 'khwopa';
	// 	$username = 'root';
	// 	$password = '';

	// 	$sql = "
	// 			INSERT INTO fruits SET 
	//  				fruitname = :fruitname
	// 		";


	// 	$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
	// 	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //PDO::ERRMODE_SILENT | PDO::ERRMODE_WARNING |  PDO::ERRMODE_EXCEPTION
	// 	$conn->exec('SET NAMES UTF8');
	// 	echo "Database Connected Succesffuly";


	// 	// $conn->exec($sql) Sql Prepare and sql execute

	// 	$stmt = $conn->prepare($sql);

	// 	$stmt->bindValue(':fruitname', 'Mangoes', PDO::PARAM_STR); // PDO::PARAM_BOOL, PDO::PARAM_STR,  PDO::PARAM_INT
	// 	$stmt->bindValue(':fruitname', 'Applesasdf', PDO::PARAM_STR); // PDO::PARAM_BOOL, PDO::PARAM_STR,  PDO::PARAM_INT
		
	// 	$stmt->execute();

	// 	echo $conn->lastInsertId();
	// 	echo "Data Added Succesffuly";
		

	// }catch(PDOException $e){
	// 	echo $e->getMessage();
	// }



//SElect Data C RUD
	// try{
	// 	$servername = 'localhost';
	// 	$dbname = 'khwopa';
	// 	$username = 'root';
	// 	$password = '';

	// 	$sql = "
	// 			SELECT * FROM fruits 
	// 				where fruitname Like '%a%' order by fruitname DESC 
	// 					LIMIT 4 OFFSET 2
	// 		";


	// 	$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
	// 	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //PDO::ERRMODE_SILENT | PDO::ERRMODE_WARNING |  PDO::ERRMODE_EXCEPTION
	// 	$conn->exec('SET NAMES UTF8');
	// 	echo "Database Connected Succesffuly";

	// 	$stmt = $conn->prepare($sql);
	// 	$stmt->execute();

	// 	$data = $stmt->fetchALL(PDO::FETCH_OBJ);
	// 	echo "<pre>";
	// 	print_r($data);

	// }catch(PDOException $e){
	// 	echo $e->getMessage();
	// }

	
// // CR UD 	
		
// 	try{
// 		$servername = 'localhost';
// 		$dbname = 'khwopa';
// 		$username = 'root';
// 		$password = '';

// 		$sql = "
// 				DELETE FROM fruits 
// 					where fruitname = 'Applesasdf'	
// 			";


// 		$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
// 		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //PDO::ERRMODE_SILENT | PDO::ERRMODE_WARNING |  PDO::ERRMODE_EXCEPTION
// 		$conn->exec('SET NAMES UTF8');
// 		echo "Database Connected Succesffuly";

// 		$stmt = $conn->prepare($sql);
// 		$stmt->execute();

// 	}catch(PDOException $e){
// 		echo $e->getMessage();
// 	}


	// CRUD 	 Update
		
	try{
		$servername = 'localhost';
		$dbname = 'khwopa';
		$username = 'root';
		$password = '';

		$sql = "
				UPDATE fruits SET 	
					fruitname = 'orange'	

				where fruitname = 'mango'
			";


		$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //PDO::ERRMODE_SILENT | PDO::ERRMODE_WARNING |  PDO::ERRMODE_EXCEPTION
		$conn->exec('SET NAMES UTF8');
		echo "Database Connected Succesffuly";

		$stmt = $conn->prepare($sql);
		$stmt->execute();

	}catch(PDOException $e){
		echo $e->getMessage();
	}
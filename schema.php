<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$schema = new schema();
	$table = array(
			'users' => "
				CREATE TABLE IF NOT EXISTS users
					(
						id int not null AUTO_INCREMENT PRIMARY KEY,
						username varchar(50),
						email varchar(150) UNIQUE KEY,
						password varchar(200),
						session_token text,
						activate_token text,
						password_reset_token text,
						role enum('Admin','Staff') default 'Staff',
						status enum('Active','Passive') default 'Passive',
						added_by int,
						created_date datetime default current_timestamp,
						updated_date datetime on update current_timestamp
					)
			",
			'superuser' => "
				INSERT into users SET 
					username = 'Admin',
					email = 'admin@magazine.com',
					password = '".sha1('admin@magazine.comadmin123')."',
					role = 'Admin',
					status = 'Active'	
			",
			'category' => "
			CREATE TABLE IF NOT EXISTS category
				(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					categoryname varchar(30),
					description text,
					status enum('Active','Passive') default 'Passive',
					added_by int,
					created_date datetime default current_timestamp,
					updated_date datetime on update current_timestamp
				)
		",
		'blogs' => "
			CREATE TABLE IF NOT EXISTS blogs
				(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					title varchar(30),
					content text,
					featured enum('Featured','notFeatured') default 'Featured',
					categoryid int,
					view int,
					image varchar(50),
					status enum('Active','Passive') default 'Active',
					added_by int,
					created_date datetime default current_timestamp,
					updated_date datetime on update current_timestamp
				)
		",
		'Advertisement' => "
			CREATE TABLE IF NOT EXISTS advertisement
				(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					vendor_name varchar(30),
					url varchar(50),
					adType enum('widead','simplead') default 'simplead',
					image varchar(50),
					status enum('Active','Passive') default 'Active',
					added_by int,
					created_date datetime default current_timestamp,
					updated_date datetime on update current_timestamp
				)
		",
		'Info' => "
			CREATE TABLE IF NOT EXISTS info
				(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					icon_name varchar(30),
					url varchar(50),
					class varchar(30),
					status enum('Active','Passive') default 'Active',
					added_by int,
					created_date datetime default current_timestamp,
					updated_date datetime on update current_timestamp
				)
		",
		'Share' => "
			CREATE TABLE IF NOT EXISTS share
				(
					id int not null AUTO_INCREMENT PRIMARY KEY,
					icon_name varchar(30),
					url varchar(50),
					class varchar(30),
					status enum('Active','Passive') default 'Active',
					added_by int,
					created_date datetime default current_timestamp,
					updated_date datetime on update current_timestamp
				)
		",
		);

	foreach ($table as $key => $sql) {
		try{
			$success = $schema->create($sql);
			// echo $sql;
			if ($success) {
				echo "Query ".$key." Executed Successfully<br>";
			}else{
				echo "Problem While Executing Query :".$key."<br>";
			}
		}catch(PDOException $e){
			error_log(Date("M d, Y h:i:s a").' : (run Query) : '.$e->getMessage()."\r\n",3,ERROR_PATH.'error.log');
			return false;

		}
	}


 ?>
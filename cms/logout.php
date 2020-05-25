<?php 
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
   	$user = new user();
    $datas = array(
		'session_token' => ""
	);
	// resetting the session_token to null in database as the user logs out 
	$user->updateUserByEmail($datas,$_SESSION['user_email']);

	// setting cookie if user has checked on remember me box
	if (isset($_COOKIE['_auth_user']) && !empty($_COOKIE['_auth_user'])) {
		setcookie('_auth_user',"",time()-(60*60*24*7),'/');
	}
	// removing or destroying session
    session_unset();
    redirect('login');
 ?>

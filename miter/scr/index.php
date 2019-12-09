<?
	session_start();
	
	$user_file = '../usr/user.xml';
	$user_get = simplexml_load_file($user_file);
	$user_array = $user_get->xpath("/miter/user[@id='probe']");
	$user_username = $user_array[0]->username;
	
	$user_username = str_replace('@','',$user_username);
	$_SESSION['miter'] = $user_username;
	
	header("Location: ../");
	die();
?>
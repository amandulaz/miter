<?
	$user_file = '../usr/user.xml';
	$tz = simplexml_load_file($user_file);
	$user_tz = $_POST["user_time_zone"];
	foreach( $tz->xpath("user[@id='probe']") as $data ) {
		$data->time = $user_tz;
	}
	$tz->asXML($user_file);
	header("location:../index.php?u=settings");
?>
<?
	$user_file = '../usr/user.xml';
	$username = simplexml_load_file($user_file);
	$miter_user = $_POST["miter_user"];
	$miter_spaces = str_replace(' ', '', $miter_user);
	$miter_name = "@" . $miter_spaces;
	foreach( $username->xpath("user[@id='probe']") as $data ) {
		$data->username = $miter_name;
	}
	$username->asXML($user_file);
	header("location:../index.php?u=settings");
?>
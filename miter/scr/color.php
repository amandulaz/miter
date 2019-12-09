<?
	$user_file = '../usr/user.xml';
	$bg = simplexml_load_file($user_file);
	$miter_color = $_POST["miter_color"];
	foreach( $bg->xpath("user[@id='probe']") as $data ) {
		$data->bgcolor = $miter_color;
	}
	$bg->asXML($user_file);
	header("location:../index.php?u=settings");
?>
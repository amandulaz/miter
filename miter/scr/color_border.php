<?
	$user_file = '../usr/user.xml';
	$border = simplexml_load_file($user_file);
	$miter_border = $_POST["miter_color_border"];
	foreach( $border->xpath("user[@id='probe']") as $data ) {
		$data->bordercolor = $miter_border;
	}
	$border->asXML($user_file);
	header("location:../index.php?u=settings");
?>
<?
	$user_file = '../usr/user.xml';
	$button = simplexml_load_file($user_file);
	$miter_button = $_POST["miter_color_header"];
	foreach( $button->xpath("user[@id='probe']") as $data ) {
		$data->btcolor = $miter_button;
	}
	$button->asXML($user_file);
	header("location:../index.php?u=settings");
?>
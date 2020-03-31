<?
	$user_file = '../usr/user.xml';
	$email_file = simplexml_load_file($user_file);
	$miter_email_call = $_POST["miter_contact_form"];
	foreach( $email_file->xpath("user[@id='probe']") as $data ) {
		$data->email = $miter_email_call;
	}
	$email_file->asXML($user_file);
	header("location:../index.php?u=settings");
?>
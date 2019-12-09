<?
	$miter_favicon = $_FILES['favicon']['name'];
	$upload_file = move_uploaded_file($_FILES['favicon']['tmp_name'], "../img/" . $miter_favicon);
	header("location:../index.php?u=settings");
?>

<?
	if (isset($_GET['d'])) {
		$loc = $_GET['d'];
		$img_file = "../img/" . $loc . "";
		unlink($img_file);
		header('location:../index.php?u=t_images');
	}
?>
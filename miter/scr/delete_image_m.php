<?
	if (isset($_GET['d'])) {
		$loc = $_GET['d'];
		$img_file = "../upl/" . $loc . "";
		unlink($img_file);
		header('location:../index.php?u=m_images');
	}
?>
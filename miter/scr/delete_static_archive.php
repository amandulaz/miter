<?
	if (isset($_GET['d'])) {
		$loc = $_GET['d'];
		$txt_file = "../ten/" . $loc . ".txt";
		unlink($txt_file);
		header('location:../index.php?a=');
	}
?>
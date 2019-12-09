<?
	if (isset($_GET['d'])) {
		$loc = $_GET['d'];
		$doc_file = "../doc/" . $loc . "";
		unlink($doc_file);
		header('location:../index.php?u=docs');
	}
?>
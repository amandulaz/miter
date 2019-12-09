<?
	
	// get menu
	$menu_post = $_POST["tenon"];
	
	// menu file name
	$menu_file = "../usr/menu.txt";
	
	// write
	$menu_data = fopen($menu_file, "w") or die("Error");
	fwrite($menu_data, $menu_post);
	fclose($menu_data);
	
	// return
	header("location:../index.php");
	
?>
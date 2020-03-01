<?
	
	// delete file + entry
	$panel_del = $_POST["panel_edit_name"];
	$panel_name = substr($panel_del, 2);
	$txt_file = "../pan/" . $panel_name . ".txt";
	unlink($txt_file);
	
	// remove line from usr/panels.txt
	$panel_dir = '../usr/panels.txt';
	$panel_data = array_map('trim', file($panel_dir));
	
	foreach($panel_data as $panel_key => $panel_line) {
		if($panel_line == $panel_del) {
			unset($panel_data[$panel_key]);
		}
	}
	
	$f_panel = fopen($panel_dir, "w+") or die("Error");
	fwrite($f_panel, implode("\n", $panel_data));
	fclose($f_panel);
	
	// get title
	$panel_title = $_POST["title"];
	
	// get post
	$panel_post = $_POST["panel"];
	
	// replace file name space
	$title_to_file = str_replace(' ','_',$panel_title);
	
	// replace non-file-compliant characters
	$title_to_file = str_replace('<','_',$title_to_file);
	$title_to_file = str_replace('>','_',$title_to_file);
	$title_to_file = str_replace(':','_',$title_to_file);
	$title_to_file = str_replace('"','_',$title_to_file);
	$title_to_file = str_replace('/','_',$title_to_file);
	$title_to_file = str_replace('\\','_',$title_to_file);
	$title_to_file = str_replace('|','_',$title_to_file);
	$title_to_file = str_replace('?','_',$title_to_file);
	$title_to_file = str_replace('*','_',$title_to_file);
	$title_to_file = str_replace('\'','_',$title_to_file);
	$title_to_file = str_replace('#','_',$title_to_file);
	
	// get file name
	$panel_file = "../pan/" . $title_to_file . ".txt";
	
	// create and write
	$data_file = fopen($panel_file, "w") or die("Error");
	fwrite($data_file, $panel_post);
	fclose($data_file);
	
	// get hide panel
	// 1 = Show 2 = Hide
	if(isset($_POST["hidepanel"]) && $_POST["hidepanel"] == 'yes') {
		$panel_hide = '2';
		} else {
		$panel_hide = '1';
	}	
	
	// get hide title
	// 1 = Show 2 = Hide
	if(isset($_POST["hidetitle"]) && $_POST["hidetitle"] == 'yes') {
		$hide_title = '2';
		} else {
		$hide_title = '1';
	}	
	
	// create new entry
	$panel_insert = $panel_hide . "" . $hide_title . "" . $title_to_file;
	
	// update usr/panels.txt
	$panel_usr = fopen("../usr/panels.txt", "a") or die("Error");
	fwrite($panel_usr, "\n" . $panel_insert);	
	fclose($panel_usr);
	
	header("location:../index.php?u=panels");
?>
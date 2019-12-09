<?
	echo "<table class='static_header'>
	<tr><td class='static_header_td'>";
	echo "<span class='title'>Documents</span>";
	echo "</td></tr></table>";
	
	echo "<table class='static_table'>
	<tr><td class='static_td'>
	<span class='tenon'>";
	
	$i = 1;
	$file_list = glob("doc/*.*");
	foreach($file_list as $file_name) {
		$file_name = str_replace("doc/","",$file_name);
		echo "" . $i++ . ". <a href='doc/" . $file_name . "' target='_blank'>" . $file_name . "</a>";
		
		// delete
		echo " <a href='scr/delete_doc.php?d=" . $file_name . "' onclick='return confirm_delete()'><img src='but/delete.jpg' class='archive_delete'></a>";
		
		echo "<br />";
	}
	
	echo "</span>
	</td></tr></table>";
?>
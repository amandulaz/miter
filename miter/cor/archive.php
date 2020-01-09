<table class='static_header'>
	<tr>
		<td class='static_header_td'>
			<span class='title'>Archive</span>
		</td>
	</tr>
</table>

<table class='static_table'>
	<tr>
		<td class='static_td'>
			<span class='tenon'>
				
				<?
					$i = 1;
					$file_list = glob("ten/*.txt");
					foreach($file_list as $file_name) {
						$file_name = str_replace("ten/","",$file_name);
						$file_name = str_replace(".txt","",$file_name);
						$file_print = str_replace("_"," ",$file_name);
						echo "" . $i++ . ". <a href='index.php?t=" . $file_name . "'>" . $file_print . "</a>";
						
						if($login == true) {
							// delete
							echo " | <a href='scr/delete_static.php?d=" . $file_name . "' onclick='return confirm_delete()'>x</a>";    
						}
						
						echo "<br />";
					}
				?> 
				
			</span>
		</td>
	</tr>
</table>		
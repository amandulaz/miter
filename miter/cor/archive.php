<table class='static_header'>
	<tr>
		<td class='static_header_td'>
			<span class='title'>Tenon Archive</span>
		</td>
	</tr>
</table>

<table class='static_table'>
	<tr>
		<td class='static_td'>
			
			<table style='width:100%;padding:0;margin:0;border:0px solid #fff;'>
				
				<?	
					
					if(isMobile()) {
						$char_count = 30;
						} else {
						$char_count = 45;
					}
					
					$i = 1;
					$file_list = glob("ten/*.txt");
					foreach($file_list as $file_name) {
						$file_name = str_replace("ten/","",$file_name);
						$file_name = str_replace(".txt","",$file_name);
						$file_print = str_replace("_"," ",$file_name);
						
						echo "<tr><td align='left'><span class='tenon'>" . $i++ . ". <a href='index.php?t=" . $file_name . "' target='_blank'>" . substr($file_print, 0, $char_count) . "</a></span>";
						if($login == true) {
							echo "</td><td align='right'><span class='name'><a href='index.php?e=" . $file_name . "#edit'><img src='but/edit.jpg' class='button_side'></a>&nbsp;&nbsp;&nbsp;";
							echo "<a href='scr/delete_image_m.php?d=" . $file_name . "' onclick='return confirm_delete()'><img src='but/delete.jpg' class='button_side'></a></span>";
						}
						echo "</td>
						</tr>";
					}
				?> 
				
			</table>
		</td>
	</tr>
</table>
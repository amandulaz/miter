<?
	function formatbytes($bytes, $precision = 2) { 
		$units = array('b', 'kb', 'mb', 'gb', 'tb'); 
		$bytes = max($bytes, 0); 
		$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
		$pow = min($pow, count($units) - 1); 
		$bytes /= (1 << (10 * $pow)); 
		// $bytes /= pow(1024, $pow);
		return round($bytes, $precision) . ' ' . $units[$pow]; 
	} 
?>

<table class='static_header'>
	<tr>
		<td class='static_header_td'>
			<span class='title'>Documents</span>
		</td>
	</tr>
</table>

<table class='static_table'>
	<tr>
		<td class='static_td'>
			
			<table style='width:100%;padding:0;margin:0;border:0px solid #fff;'>
				
				<?
					$i = 1;
					$file_list = glob("doc/*.*");
					foreach($file_list as $file_name) {
						$file_name = str_replace("doc/","",$file_name);
						$file_loc = "doc/" . $file_name;
						$file_size = filesize($file_loc);
						
						echo "<tr><td align='left'><span class='tenon'>" . $i++ . ". <a href='doc/" . $file_name . "' target='_blank'>" . substr($file_name, 0, 30) . "</a></span>";
						echo "</td><td align='right'><span class='name'>" . formatbytes($file_size) . " <a href='scr/delete_doc.php?d=" . $file_name . "' onclick='return confirm_delete()'>X</a></span>";
						echo "</td></tr>";
					}
				?>
				
			</table>
		</td>
	</tr>
</table>
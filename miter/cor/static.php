<?
	
	if (isset($_GET['e'])) {
		if($login == true) {
			$tenon_id = $_GET['e'];
		}
		} else {
		$tenon_id = $_GET['t'];
	}
	
	$tenon_dir = 'ten/' . $tenon_id . '.txt';
	$tenon_data = file_get_contents($tenon_dir);
	list($title, $odate, $gdate, $tenon) = explode("|&|", $tenon_data);
	
	echo "<table class='static_header'>
	<tr>
	<td class='static_header_td'>";
	
	echo "<span class='title'>" . $title . "</span>";
	
	echo "</td>
	</tr>
	</table>";
	
	echo "<table class='static_table'>
	<tr>
	<td class='static_td'>";
	
	// print
	echo "<span class='tenon'>" . $tenon . "</span>";
	
	echo "<div class='space_permalink'></div>";
	
	// permalink 
	echo "<a href='index.php?t=" . $title . "' class='permalink' style='color:silver;'>" . $odate . "</a><br />";
	
	if($login == true) {
		
		echo "<div class='space_buttons'></div>";
		
		echo "<table class='button_table'>
		<tr>
		<td class='button_td'>";
		
		// edit
		echo "<a href='index.php?e=" . $tenon_id . "#edit'><img src='but/edit.jpg' class='button_img_edit' title='Edit'></a>";
		
		echo "</td>
		<td class='button_td'>";
		
		// delete
		echo "<a href='scr/delete_static.php?d=" . $tenon_id . "' onclick='return confirm_delete()'><img src='but/delete.jpg' class='button_img' title='Delete'></a>";
		
		echo "</td>
        </tr>
		</table>";
		
	}  
	
	echo "</td>
	</tr>
	</table>";
	
	// edit
	if($login == true) {
		if (isset($_GET['e'])) {
			echo "<div class='bump'></div>";
			include 'scr/edit.php';
		}
	}
	
?>
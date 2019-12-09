<?
	
	$menu_edit_dir = 'usr/menu.txt';
	$menu_edit = file_get_contents($menu_edit_dir);
	
?>

<table class='static_header'>
	<tr><td class='static_header_td'>
		<span class='title'>Edit Menu</span>
	</td></tr></table>
	
	<table class="gen_table">
		<tr>
			<td class='gen_td'>
				
				<form name="tenonform" id="tenonform" action="scr/menu_write.php" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
					
					<table class="title_table">
						<tr>
							<td class="title_td">Edit Menu</td>
						</tr>
					</table>
					
					<table class="input_table">
						<tr>
							<td class="input_td">
								
								<textarea id="tenon" name="tenon" class="tenon_input"><? echo $menu_edit; ?></textarea>
								
							</td>
						</tr>
					</table>
					
					<? include 'buttons.php'; ?>
					
					<table class="submit_table">
						<tr>
							<td class="submit_td" align="center">
								
								<input type="submit" name="submit" value="Submit" class="tenon_submit">
								
							</td>
						</tr>
					</table>
					
				</td>
			</tr>
		</table>
        
	</form>
	
	<script src="scr/form.js"></script>	
<table class='static_header'>
	<tr>
		<td class='static_header_td'>
			<span class='title'>Panels</span>
		</td>
	</tr>
</table>

<table class='static_table'>
	<tr>
		<td class='static_td'>
			
			<table style='width:100%;padding:0;margin:0;border:0px solid #fff;'>
				<?
					// panel list
					$panel_file = file('usr/panels.txt');
					$count_panels = count($panel_file);
					$count_panels = $count_panels - 1;
					$i = 1;
					foreach($panel_file as $panel_item) {
						
						$panel_item_hide = substr($panel_item, 0, 1);
						$panel_item_notitle = substr($panel_item, 1, 1);
						$panel_item_get = substr($panel_item, 2);
						$panel_item_title = preg_replace('/\s+/', '', $panel_item_get);
						$panel_item_line = $panel_item_hide . "" . $panel_item_notitle . "" . $panel_item_title;
						$panel_adj_title = str_replace("_", " ", $panel_item_title);
						$array_pos = $i - 1;
						
						echo "<tr><td align='left'><span class='tenon'>" . $i++ . ". <a href='index.php?u=panels&p=" . $panel_item_line . "'>" . substr($panel_adj_title, 0, 30) . "</a></span>";
						echo "</td><td align='right'><span class='name'>";
						if ($array_pos == '0') {
							echo "<img src='but/up.jpg' class='button_side' style='opacity:0.5;'>&nbsp;&nbsp;&nbsp;&nbsp;";
							} else {
							echo "<a href='scr/panels_up.php?p=" . $array_pos . "'><img src='but/up.jpg' class='button_side'></a>&nbsp;&nbsp;&nbsp;&nbsp;";
						}
						if ($array_pos == $count_panels) {
							echo "<img src='but/down.jpg' class='button_side' style='opacity:0.5;'>&nbsp;&nbsp;&nbsp;&nbsp;";
							} else {
							echo "<a href='scr/panels_down.php?p=" . $array_pos . "'><img src='but/down.jpg' class='button_side'></a>&nbsp;&nbsp;&nbsp;&nbsp;";
						}
						echo "<a href='scr/panels_delete.php?p=" . $panel_item_line . "' onclick='return confirm_delete()'><img src='but/delete.jpg' class='button_side'></a></span>";
						echo "</td></tr>";
					}
				?>
			</table>
			
		</td>
	</tr>
</table>

<div class='bump'></div>

<?
	if (isset($_GET['p'])) {
		$panel_huh = $_GET['p'];
		$panel_huh_hide = substr($panel_huh, 0, 1);
		$panel_huh_notitle = substr($panel_huh, 1, 1);
		$panel_huh_get = substr($panel_huh, 2);
		$panel_addy = "pan/" . $panel_huh_get . ".txt";
		$panel_fill_title = str_replace("_", " ", $panel_huh_get);
		$panel_write_edit = $_GET['p'];
	}
?>

<table class='static_header'>
	<tr>
		<td class='static_header_td'>
			
			<?				
				if (isset($_GET['p'])) {
					echo "<span class='title'>Edit Panel</span>";
					} else {
					echo "<span class='title'>New Panel</span>";
				}
			?>
			
		</td>
	</tr>
</table>

<table class="gen_table">
	<tr>
		<td class='gen_td'>
			
			<form name="panelform" id="panelform" action="scr/<?
				if (isset($_GET['p'])) {
					echo 'panels_edit.php';
					} else {
					echo 'panels_new.php';
				}
				?>" method="POST" enctype="multipart/form-data" onsubmit="return validate_panel()">
				
				<table class="title_table">
					<tr>
						<td class="title_td">
							<input id="title" name="title" class="title_field" placeholder="Title" value="<?
								if (isset($_GET['p'])) {
									echo $panel_fill_title;
								}
							?>" required>
						</td>
					</tr>
				</table>
				
				<table class="input_table">
					<tr>
						<td class="input_td">
							<textarea id="panel" name="panel" class="tenon_input" placeholder="Content"><?
								if (isset($_GET['p'])) {
									include $panel_addy;
								}
							?></textarea>
						</td>
					</tr>
				</table>
				
				<? include 'panels_buttons.php'; ?>
				
				<table class="panel_option_housing">
					<tr>
						<td align="center">
							<table class="panel_option_table">
								<tr>
									<td class="panel_option_td">
										<?
											if ($panel_huh_notitle == '2') {
												echo "<span class='tenon'><input type='checkbox' id='hidetitle' name='hidetitle' value='yes' checked> Hide Title</span>";
												} else {
												echo "<span class='tenon'><input type='checkbox' id='hidetitle' name='hidetitle' value='yes'> Hide Title</span>";
											}
										?>
									</td>
									<td width="12">
									</td>
									<td class="panel_option_td">
										<?
											if ($panel_huh_hide == '2') {
												echo "<span class='tenon'><input type='checkbox' id='hidepanel' name='hidepanel' value='yes' checked> Hide Panel</span>";
												} else {
												echo "<span class='tenon'><input type='checkbox' id='hidepanel' name='hidepanel' value='yes'> Hide Panel</span>";
											}
										?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				
				<?
					if (isset($_GET['p'])) {
						echo "<input type='hidden' id='panel_edit_name' name='panel_edit_name' value='" . $panel_write_edit . "'>";
					}
				?>
				
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
	
	<script src='scr/autosize.js'></script>
	<script> autosize(document.querySelectorAll('textarea')); </script>
	
</form>

<script src="scr/form.js"></script>							